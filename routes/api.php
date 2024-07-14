<?php

use App\Http\Controllers\PlaylistController;
use App\Http\Middleware\ApiKeyMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/playlists', [PlaylistController::class, 'getPlaylists'])->middleware(ApiKeyMiddleware::class);;