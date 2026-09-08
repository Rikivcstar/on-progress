<div style="border:1px solid #ccc; padding:10px; margin-bottom:8px;">
    <strong>{{ $name }}</strong><br>
    Harga: @rupiah($price) <br>
    Stok: {{ $stock }}

    @if($stock < 10)
        <x-badge color="red">Stock Menipis</x-badge>
    @else
        <x-badge color="gray">Stock Ada</x-badge>
    @endif
</div>
