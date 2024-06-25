<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('friend_add/{yourFriendId}',[FriendController::class,'friend_add']);
Route::get('user-friend/{userId}',[FriendController::class,'user_friend']);

Route::get('user-list',[UserController::class,'index']);
Route::post('user-create',[UserController::class,'create']);

Route::get('post-list',[PostController::class,'index']);