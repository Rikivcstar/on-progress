<div>
    <h1>Edit Product</h1>
    <form method="POST" action="{{ route('products.update', $product) }}">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ old('name', $product->name) }}" placeholder="Masukan Nama"><br>
        @error('name')
            <p style="color: red; font-style: italic">{{ $message }}</p>
        @enderror
        <input type="number" name="price" value="{{ old('price', $product->price) }}" placeholder="Masukan Harga"><br>
        @error('price')
            <p style="color: red; font-style: italic">{{ $message }}</p>
        @enderror
        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" placeholder="Masukan Stock"><br>
        @error('stock')
            <p style="color: red; font-style: italic">{{ $message }}</p>
        @enderror
        <button type="submit">Simpan Perubahan</button>
        <a href="{{ route('products.index') }}">Batal</a>
    </form>
</div>
