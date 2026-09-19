<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Tests\Integration\Queue\Order;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category', 'tags')
                    ->latest()
                    ->paginate(3);
        $lowStockCount = Product::lowStock()->count();
        return view('products.index', compact('products', 'lowStockCount'));
    }

    /**
     * Show the form for creating a new resource
     */
    public function create(Request $request)
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        $validated['slug'] = Str::slug($validated['name']);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Data Product Berhasil Di Buat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'data berhasil dihapus');
    }


public function checkout(Request $request, Product $product)
{
    $request->validate(['qty' => 'require|integer|min:2']);

    try{
        DB::transaction(function () use ($product, $request) {
            if($product->stock < $request->qty){
                throw new \Exception('stock tidak cukup');
            }
            $product->decrement('stock', $request->qty);
        });

        return back()->with('success', 'CheckOut Berhasil');
    }catch(\Exception $e)
    {
        return back()->with('error', $e->getMessage());
    }
}

}
