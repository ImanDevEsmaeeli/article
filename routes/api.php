<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Like\LikeController;
use App\Http\Controllers\auth\ForgotPasswordController;
use App\Http\Controllers\auth\ResetPasswordController;

Route::group(['prefix' => 'auth'],function (){
    Route::post('register',RegisterController::class);
    Route::post('login',LoginController::class);
    Route::post('forgotPassword',ForgotPasswordController::class);
    Route::post('resetPassword',ResetPasswordController::class);
});

Route::group(['middleware' => 'auth:sanctum'],function (){
    Route::apiResource('article',ArticleController::class);
    Route::post('like',LikeController::class);

});




