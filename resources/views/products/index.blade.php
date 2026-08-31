<div>

    <a href="{{ route('products.create') }}">+ Tambah Produk</a>
    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif
    <h2>Daftar Product toko electronic</h2>
    <p>Total Products :{{ $products->count() }}</p>
    @foreach ($products as $product)
        <ul>
            <li>Nama Product : {{ $product->name }} - Harga Rp.{{ number_format($product->price) }}
                @if($product->stock < 10)
                    <strong style="color:red">(Stok Menipis!)</strong>
                @endif
            </li>
        </ul>
    @endforeach
</div>
