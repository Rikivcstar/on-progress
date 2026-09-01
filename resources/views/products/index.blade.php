<div>

    <a href="{{ route('products.create') }}">+ Tambah Produk</a>
    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif
    <h2>Daftar Product toko electronic</h2>
    <p>Total Products :{{ $products->count() }}</p>
    @foreach ($products as $product)
        <x-product-card
            :name="$product->name"
            :price="$product->price"
            :stock="$product->stock"
        />
    @endforeach
</div>
