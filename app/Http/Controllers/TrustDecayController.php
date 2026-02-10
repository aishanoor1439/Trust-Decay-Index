<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class TrustDecayController extends Controller
{
    // Core Trust Decay Algorithm
    public function calculateTDI($behavior, $delay, $transparency, $lastFeedbackDays = null)
    {
        // Weight factors (customizable)
        $w1 = 0.4; // Behavior weight
        $w2 = 0.35; // Delay weight
        $w3 = 0.25; // Transparency weight
        
        // Calculate weighted sum (10 is max score, so convert to percentage)
        $weightedSum = (($behavior * $w1) + ($delay * $w2) + ($transparency * $w3)) * 10;
        
        // Decay factor (λ = 0.05)
        $lambda = 0.05;
        $timeFactor = $lastFeedbackDays ?? 7; // Default to 7 days if no feedback
        
        // Apply decay: e^(-λ * t)
        $decayFactor = exp(-$lambda * $timeFactor);
        
        // Final TDI score (0-100 scale)
        $tdi = $weightedSum * $decayFactor;
        
        return round(max(0, min(100, $tdi)), 2);
    }

    // Get all institutions
    public function getInstitutions()
    {
        $institutions = DB::table('institutions')
            ->select('id', 'name', 'description', 'category', 'trust_score', 'feedback_count')
            ->orderBy('trust_score', 'asc')
            ->get();
        
        return response()->json([
            'success' => true,
            'data' => $institutions,
            'timestamp' => now()->toISOString()
        ]);
    }

    // Submit anonymous feedback
    public function submitFeedback(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'institution_id' => 'required|integer|exists:institutions,id',
            'behavior_score' => 'required|integer|between:1,10',
            'delay_score' => 'required|integer|between:1,10',
            'transparency_score' => 'required|integer|between:1,10',
            'session_token' => 'required|string|size:64'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Rate limiting: 3 submissions per session per hour
        $recentSubmissions = DB::table('feedback')
            ->where('session_token', $request->session_token)
            ->where('created_at', '>', now()->subHour())
            ->count();

        if ($recentSubmissions >= 3) {
            return response()->json([
                'success' => false,
                'message' => 'Rate limit exceeded. Please try again later.'
            ], 429);
        }

        DB::beginTransaction();

        try {
            // Get last feedback time for decay calculation
            $lastFeedback = DB::table('feedback')
                ->where('institution_id', $request->institution_id)
                ->orderBy('created_at', 'desc')
                ->first();

            $daysSinceLastFeedback = $lastFeedback 
                ? Carbon::parse($lastFeedback->created_at)->diffInDays(now())
                : 7;

            // Calculate TDI
            $tdi = $this->calculateTDI(
                $request->behavior_score,
                $request->delay_score,
                $request->transparency_score,
                $daysSinceLastFeedback
            );

            // Insert feedback
            $feedbackId = DB::table('feedback')->insertGetId([
                'institution_id' => $request->institution_id,
                'behavior_score' => $request->behavior_score,
                'delay_score' => $request->delay_score,
                'transparency_score' => $request->transparency_score,
                'session_token' => $request->session_token,
                'calculated_tdi' => $tdi,
                'created_at' => now()
            ]);

            // Update institution trust score (weighted average)
            $institution = DB::table('institutions')
                ->where('id', $request->institution_id)
                ->first();

            $newTrustScore = ($institution->trust_score * $institution->feedback_count + $tdi) 
                           / ($institution->feedback_count + 1);

            DB::table('institutions')
                ->where('id', $request->institution_id)
                ->update([
                    'trust_score' => round($newTrustScore, 2),
                    'feedback_count' => $institution->feedback_count + 1,
                    'last_feedback_at' => now(),
                    'updated_at' => now()
                ]);

            // Record in history
            DB::table('trust_history')->insert([
                'institution_id' => $request->institution_id,
                'trust_score' => round($newTrustScore, 2),
                'feedback_count' => $institution->feedback_count + 1,
                'calculated_at' => now()
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Feedback submitted anonymously',
                'tdi_score' => $tdi,
                'institution_new_score' => round($newTrustScore, 2),
                'feedback_id' => $feedbackId
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Server error: ' . $e->getMessage()
            ], 500);
        }
    }

    // Live Analytics Dashboard Data
    public function getAnalytics()
    {
        $analytics = DB::table('institutions as i')
            ->select([
                'i.id',
                'i.name',
                'i.category',
                'i.trust_score',
                'i.feedback_count',
                'i.last_feedback_at',
                DB::raw('COALESCE(AVG(f.behavior_score), 0) as avg_behavior'),
                DB::raw('COALESCE(AVG(f.delay_score), 0) as avg_delay'),
                DB::raw('COALESCE(AVG(f.transparency_score), 0) as avg_transparency'),
                DB::raw('COUNT(DISTINCT DATE(f.created_at)) as active_days'),
                DB::raw('(SELECT trust_score FROM trust_history WHERE institution_id = i.id ORDER BY calculated_at DESC LIMIT 1,1) as previous_score')
            ])
            ->leftJoin('feedback as f', 'i.id', '=', 'f.institution_id')
            ->groupBy('i.id', 'i.name', 'i.category', 'i.trust_score', 'i.feedback_count', 'i.last_feedback_at')
            ->orderBy('i.trust_score', 'asc')
            ->get();

        // Calculate trends
        foreach ($analytics as $item) {
            $item->trend = $item->previous_score 
                ? round((($item->trust_score - $item->previous_score) / $item->previous_score) * 100, 2)
                : 0;
            
            $item->status = match(true) {
                $item->trust_score >= 70 => 'excellent',
                $item->trust_score >= 50 => 'good',
                $item->trust_score >= 30 => 'warning',
                default => 'critical'
            };
        }

        // Overall statistics
        $stats = [
            'total_institutions' => $analytics->count(),
            'average_trust_score' => round($analytics->avg('trust_score'), 2),
            'total_feedback' => $analytics->sum('feedback_count'),
            'worst_performer' => $analytics->sortBy('trust_score')->first(),
            'best_performer' => $analytics->sortByDesc('trust_score')->first()
        ];

        return response()->json([
            'success' => true,
            'analytics' => $analytics,
            'statistics' => $stats,
            'last_updated' => now()->toISOString()
        ]);
    }

    // Generate session token for rate limiting
    public function generateSessionToken()
    {
        $token = hash('sha256', uniqid(mt_rand(), true) . microtime(true));
        
        return response()->json([
            'success' => true,
            'session_token' => $token,
            'expires_in' => '3600 seconds'
        ]);
    }
}