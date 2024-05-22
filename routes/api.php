<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Article\ArticleController;

Route::post('auth/register',RegisterController::class);
Route::post('auth/login',LoginController::class);
Route::apiResource('article',ArticleController::class)->middleware('auth:sanctum');
