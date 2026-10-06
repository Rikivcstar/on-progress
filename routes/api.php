<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::post('/login', function (Request $request) {
        $request->validate(['email' => 'required|email', 'password' => 'required|min:3']);

        $user = User::where('email', $request->email)->first();

        if(! $user || ! Hash::check($request->password, $user->password)){
            return response()->json(['message' => 'Kredensial salah'], 401);
        }

        return response()->json(['token' => $user->createToken('api-token')->plainTextToken]);
});

Route::middleware('auth:sanctum')->get('/products', function () {
    return Product::all();
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
