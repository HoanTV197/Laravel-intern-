<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

//auth
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/forgot_password', [AuthController::class,'forgotPassword']);
Route::post('/auth/verify_email', [AuthController::class,'verifyEmail']);
Route::post('/auth/send_verify', [AuthController::class,'sendVerify']);

Route::middleware(['auth:sanctum',\App\Http\Middleware\AuthUser::class])->group(function () {
    Route::get('/auth/me', [AuthController::class,'me']);
    Route::post('/auth/logout', [AuthController::class,'logout']);
});
