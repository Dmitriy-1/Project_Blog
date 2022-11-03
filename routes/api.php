<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
Use \App\Http\Controllers\UserController;
Use \App\Http\Controllers\AuthController;
Use \App\Http\Controllers\LogoutController;
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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function (){
    Route::post('/posts/create', [PostController::class, 'store']);
    Route::put('/posts/update/{post}', [PostController::class, 'update']);
    Route::delete('/posts/delete/{id}', [PostController::class, 'destroy']);

    Route::post('/users/create', [UserController::class, 'store']);
    Route::put('/users/update/{user}', [UserController::class, 'update']);
    Route::delete('/users/delete/{id}', [UserController::class, 'destroy']);

    Route::get('/logout', [LogoutController::class, 'logout']);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);

Route::post('/registration', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'login']);
