<div>

    <a href="{{ route('products.create') }}">+ Tambah Produk</a>
    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif
    <h2>Daftar Product</h2>
    @foreach ($products as $product)
        <ul>
            <li>Nama Product : {{ $product->name }} - Harga Rp.{{ number_format($product->price) }}</li>
        </ul>
    @endforeach
</div>
