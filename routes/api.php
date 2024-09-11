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

Route::post('/personal-access-tokens', [\App\Http\Controllers\PersonalAccessTokenController::class, 'store']);


Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index']);
Route::get('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'show']);

Route::get('/channels', [\App\Http\Controllers\ChannelController::class, 'index']);
Route::get('/channels/{channel}', [\App\Http\Controllers\ChannelController::class, 'show']);

Route::get('/playlists', [\App\Http\Controllers\PlayListController::class, 'index']);
Route::get('/playlists/{playlist}', [\App\Http\Controllers\PlayListController::class, 'show']);

Route::get('/videos', [\App\Http\Controllers\VideoController::class, 'index']);
Route::get('/videos/{video}', [\App\Http\Controllers\VideoController::class, 'show']);

Route::get('/comments', [\App\Http\Controllers\CommentController::class, 'index']);
Route::get('/comments/{comment}', [\App\Http\Controllers\CommentController::class, 'show']);
Route::post('/comments', [\App\Http\Controllers\CommentController::class, 'store'])->middleware('auth:sanctum');
Route::put('/comments/{comment}', [\App\Http\Controllers\CommentController::class, 'update']);
Route::delete('/comments/{comment}', [\App\Http\Controllers\CommentController::class, 'destroy']);


