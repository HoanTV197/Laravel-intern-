<?php
use App\Http\Controllers\Admin\AuthAdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/auth/login', [AuthAdminController::class,'login']);
Route::middleware(['auth:sanctum',\App\Http\Middleware\AuthAdmin::class])->group(function () {
    Route::apiResource('/user', \App\Http\Controllers\Admin\UserAdminController::class);
    Route::post('/auth/me', [AuthAdminController::class,'me']);
    Route::post('/auth/logout', [AuthAdminController::class,'logout']);
});

