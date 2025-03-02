<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\PostControllerV2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::get('posts', [PostController::class, 'index']);
// Route::get('posts/{id}', [PostController::class, 'show']);
// Route::post('posts', [PostController::class, 'store']);
// Route::patch('posts/{id}', [PostController::class, 'update']);
// Route::delete('posts/{id}', [PostController::class, 'destroy']);

Route::get('posts', [PostControllerV2::class, 'index']);
Route::get('posts/{post}', [PostControllerV2::class, 'show']);
Route::post('posts', [PostControllerV2::class, 'store']);
Route::patch('posts/{post}', [PostControllerV2::class, 'update']);
Route::delete('posts/{post}', [PostControllerV2::class, 'destroy']);
