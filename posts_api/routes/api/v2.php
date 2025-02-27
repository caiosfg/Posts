<?php

use App\Http\Controllers\Api\V2\CompletePostController;
use App\Http\Controllers\Api\V2\PostController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->prefix('v2')->group(function () {
    Route::apiResource('/posts', PostController::class);
    Route::patch('/posts/{post}/admin', CompletePostController::class);
});
