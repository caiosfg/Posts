<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/api/v1.php';
require __DIR__ . '/api/v2.php';

Route::prefix('auth')->group(function () {
    Route::post('/login', LoginController::class);
    Route::post('/logout', LogoutController::class);
    Route::post('/register', RegisterController::class);
});

Route::get('/user', function(Request $request) {
    return $request->user();
});
