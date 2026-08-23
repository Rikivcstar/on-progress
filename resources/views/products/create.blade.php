<div>
    <h1>Tambah Product</h1>
    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        <input type="text" name="name" placeholder="Masukan Nama"><br>
        @error('name')
            <p style="color: red; font-style: italic">{{ $message }}</p>
        @enderror
        <input type="number" name="price" placeholder="Masukan Harga"><br>
        <input type="number" name="stock" placeholder="Masukan Stock"><br>
        <button type="submit">Simpan</button>
    </form>
</div>
