<div>
    <h2>Daftar Product</h2>
    @foreach ($products as $product)
        <ul>
            <li>Nama Product : {{ $product->name }} - Harga Rp.{{ number_format($product->price) }}</li>
        </ul>
    @endforeach
</div>
