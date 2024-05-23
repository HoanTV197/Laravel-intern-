<?php

use App\Http\Controllers\Admin\AuthAdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ArticleController;

Route::post('/auth/login', [AuthAdminController::class, 'login']);
Route::middleware(['auth:sanctum', \App\Http\Middleware\AuthAdmin::class])->group(function () {
    Route::apiResource('/user', \App\Http\Controllers\Admin\UserAdminController::class);
    Route::post('/auth/me', [AuthAdminController::class, 'me']);
    Route::post('/auth/logout', [AuthAdminController::class, 'logout']);

    //categories
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/{id}', [CategoryController::class, 'show']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::put('/categories/{id}', [CategoryController::class, 'update']);
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

    //products
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);

    //Orders
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{id}', [OrderController::class, 'show']);
    Route::post('/orders/status/{id}', [OrderController::class, 'updateStatus']);

    //Articles
    Route::get('/articles', [ArticleController::class, 'index']);
    Route::get('/articles/{id}', [ArticleController::class, 'show']);
    Route::post('/articles', [ArticleController::class, 'store']);
    Route::put('/articles/{id}', [ArticleController::class, 'update']);
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy']);

});
