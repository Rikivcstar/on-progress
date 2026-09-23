<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

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
        if (Gate::denies('manage-products')) {
            abort(403, 'Kamu tidak memiliki akses untuk menambahkan product.');
        }

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
    public function edit(Product $product)
    {
        Gate::authorize('update', $product);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        Gate::authorize('update', $product);

        $validated = $request->validated();

        if (array_key_exists('name', $validated)) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Data Product Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Gate::authorize('delete', $product);

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function checkout(Request $request, Product $product)
    {
        $request->validate(['qty' => 'require|integer|min:2']);

        try {
            DB::transaction(function () use ($product, $request) {
                if ($product->stock < $request->qty) {
                    throw new \Exception('stock tidak cukup');
                }
                $product->decrement('stock', $request->qty);
            });

            return back()->with('success', 'CheckOut Berhasil');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
