<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);
Route::get('/users/{user}', [\App\Http\Controllers\UserController::class, 'show']);

Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index']);
Route::get('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'show']);

Route::get('/channels', [\App\Http\Controllers\ChannelController::class, 'index']);
Route::get('/channels/{channel}', [\App\Http\Controllers\ChannelController::class, 'show']);

Route::get('/videos', [\App\Http\Controllers\VideoController::class, 'index']);
Route::get('/videos/{video}', [\App\Http\Controllers\VideoController::class, 'show']);
