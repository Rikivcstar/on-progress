@extends('layouts.app')
    @section('content')
    <x-slot:title>
        Daftar Produk - Toko Elektronik
    </x-slot:title>
    <p class="text-sm text-gray-500 mb-4">
        {{ $lowStockCount }} produk dengan stok menipis.
    </p>
    <div class="bg-white rounded-lg p-6 shadow-sm">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">Katalog Produk Terbaru</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="border rounded-lg p-4 bg-gray-50">
                @forelse ($products as $product)
                    <x-product-card
                        :name="$product->name"
                        :price="$product->price"
                        :stock="$product->stock"
                    />
                @empty
                    <p class="text-gray-100 col-span-1">Data Products Kosong</p>
                @endforelse
                <div class="mt-6">
                    {{ $products->links() }}
                </div>
            </div>

        </div>
    </div>
    @endsection

