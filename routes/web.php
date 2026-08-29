<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function() {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/products', ProductController::class);
});

require __DIR__.'/auth.php';


// Route::get('/products/{id}', function($id){
//     return Product::findOrFail($id);
// })->name('products.show');

// Route::prefix('admin')->name('admin.')->group(function(){
//     Route::get('/products', function() {
//         return 'Halaman Untuk Admin Saja Kelola Product';
//     })->name('products.index');
// });
