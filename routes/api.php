<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;


    // AUTH (PUBLIC)

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);


    // AUTHENTICATED ROUTES

    Route::middleware('auth:api')->group(function () {

    // LOGOUT 
    Route::post('/logout', [AuthController::class, 'logout']);

    //CLIENTE

    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{id}', [ProductController::class, 'show']);

    Route::post('/orders', [OrderController::class, 'store'])
        ->middleware('role:cliente');

    Route::get('/orders/me', [OrderController::class, 'myOrders'])
        ->middleware('role:cliente');

    Route::post('/payments', [PaymentController::class, 'store'])
        ->middleware('role:cliente');

    
    // PROVEEDOR

    Route::post('/products', [ProductController::class, 'store'])
        ->middleware('role:proveedor');

    Route::put('/products/{id}', [ProductController::class, 'update'])
        ->middleware('role:proveedor');

    Route::delete('/products/{id}', [ProductController::class, 'destroy'])
        ->middleware('role:proveedor');

    Route::get('/orders', [OrderController::class, 'index'])
        ->middleware('role:proveedor');

    Route::patch('/orders/{id}/status', [OrderController::class, 'updateStatus'])
        ->middleware('role:proveedor');

    Route::post('/categories', [CategoryController::class, 'store'])
        ->middleware('role:proveedor');

    Route::put('/categories/{id}', [CategoryController::class, 'update'])
        ->middleware('role:proveedor');

    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])
        ->middleware('role:proveedor');

    // ADMIN

    Route::get('/users', [UserController::class, 'index'])
        ->middleware('role:admin');

    Route::get('/users/{id}', [UserController::class, 'show'])
        ->middleware('role:admin');

    Route::put('/users/{id}', [UserController::class, 'update'])
        ->middleware('role:admin');

    Route::delete('/users/{id}', [UserController::class, 'destroy'])
        ->middleware('role:admin');

    
});

