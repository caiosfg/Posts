<?php

use App\Http\Controllers\Api\V1\CompletePostController;
use App\Http\Controllers\Api\V1\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::apiResource('/posts', PostController::class);
    Route::patch('/posts/{post}/admin', CompletePostController::class);
});
