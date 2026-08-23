<div>
    <h1>Tambah Product</h1>
    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        <input type="text" name="name" placeholder="Masukan Nama"><br>
        <input type="number" name="price" placeholder="Masukan Harga"><br>
        <input type="number" name="stock" placeholder="Masukan Stock"><br>
        <button type="submit">Simpan</button>
    </form>
</div>
