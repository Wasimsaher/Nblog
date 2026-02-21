<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('posts' , [PostController::class , 'index']);

Route::get('/posts/create/' , [PostController::class , 'create']);

Route::post('/posts/store' , [PostController::class , 'store']);

Route::get('/posts/{id}' , [PostController::class , 'show']);

Route::get('/posts/{id}/edit' , [PostController::class , 'edit']);

Route::put('/posts/{id}' , [PostController::class , 'update']);

Route::delete('/posts/{id}' , [PostController::class , 'destroy']);
