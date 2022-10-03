<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
Use \App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::post('/posts/create', [PostController::class, 'store']);
Route::put('/posts/update/{post}', [PostController::class, 'update']);
Route::delete('/posts/delete/{post}', [PostController::class, 'destroy']);

Route::get('/users', [UserController::class, 'index']);
Route::post('/users/create', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users/update/{user}', [UserController::class, 'update']);
Route::delete('/users/delete/{user}', [UserController::class, 'destroy']);
