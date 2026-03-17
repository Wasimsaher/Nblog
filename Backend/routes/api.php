<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiPostController;


Route::apiResource('posts', ApiPostController::class);
