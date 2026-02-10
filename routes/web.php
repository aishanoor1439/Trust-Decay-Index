<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrustDecayController;

// API Routes
Route::prefix('api')->group(function () {
    Route::get('/institutions', [TrustDecayController::class, 'getInstitutions']);
    Route::get('/analytics', [TrustDecayController::class, 'getAnalytics']);
    Route::get('/session-token', [TrustDecayController::class, 'generateSessionToken']);
    Route::post('/feedback', [TrustDecayController::class, 'submitFeedback']);
});

// Web Routes
Route::get('/', function () {
    return view('index');
});

Route::get('/analytics', function () {
    return view('analytics');
});