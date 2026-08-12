<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProsesCheckoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);

Route::post('/chechout', ProsesCheckoutController::class);
