<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuantifyController;

// Home page
Route::get('/', function () {
    return view('index');
});

// API Routes
Route::prefix('api')->group(function () {
    Route::get('/modules', [QuantifyController::class, 'getModules']);
    Route::get('/services', [QuantifyController::class, 'getServices']);
    Route::get('/analytics', [QuantifyController::class, 'getAnalytics']);
    Route::get('/methodology', [QuantifyController::class, 'getMethodology']);
    Route::get('/session-token', [QuantifyController::class, 'generateSessionToken']);
    Route::post('/feedback', [QuantifyController::class, 'submitFeedback']);
});

// Catch-all for SPA routing
Route::get('/{any}', function () {
    return view('index');
})->where('any', '.*');