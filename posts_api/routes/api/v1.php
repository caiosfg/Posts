<?php

use App\Http\Controllers\Api\V1\CompletePostController;
use App\Http\Controllers\Api\V1\OpnionController;
use App\Http\Controllers\Api\V1\PostController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {
    Route::apiResource('/posts', PostController::class);
    Route::patch('/posts/{post}/admin', CompletePostController::class);
});

Route::prefix('v1')->group(function () {
    Route::apiResource('/opnions', OpnionController::class);
});
