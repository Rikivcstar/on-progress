@extends('layouts.app')
    @section('content')
    @can('manage-products')
        <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded"></a>

    @endcan
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
                    <div>
                        <x-product-card
                            :name="$product->name"
                            :price="$product->price"
                            :stock="$product->stock"
                        />
                        <div class="mt-2 flex gap-2">
                            @can('update', $product)
                                <a href="{{ route('products.edit', $product) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-sm">Edit</a>
                            @endcan
                            @can('delete', $product)
                                <form method="POST" action="{{ route('products.destroy', $product) }}" onsubmit="return confirm('Yakin ingin menghapus product ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-sm">Hapus</button>
                                </form>
                            @endcan
                        </div>
                    </div>
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

