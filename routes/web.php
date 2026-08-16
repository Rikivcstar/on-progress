<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/products/{id}', function($id){
//     return Product::findOrFail($id);
// })->name('products.show');

// Route::prefix('admin')->name('admin.')->group(function(){
//     Route::get('/products', function() {
//         return 'Halaman Untuk Admin Saja Kelola Product';
//     })->name('products.index');
// });

Route::resource('/products', ProductController::class);
