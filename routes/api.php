<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Like\LikeController;

Route::post('auth/register',RegisterController::class);
Route::post('auth/login',LoginController::class);
Route::group(['middleware' => 'auth:sanctum'],function (){
    Route::apiResource('article',ArticleController::class);
    Route::post('like',LikeController::class);
});

Route::post('forgotPassword',\App\Http\Controllers\auth\ForgotPasswordController::class);
Route::post('resetPassword',\App\Http\Controllers\auth\ResetPasswordController::class);
