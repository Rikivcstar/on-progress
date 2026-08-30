<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('products:low-stock {--limit=10}')]
#[Description('Tampilkan product dengan stock di bawah batas tertentu')]
class CheckLowStock extends Command
{
    public function handle()
    {
        $limit = $this->option('limit');

        $products = Product::where('stock', '<', $limit)->get();

        if ($products->isEmpty()) {
            $this->info('tidak ada stock barang yang menipis');
            return;
        }

        $this->table(
            ['Nama', 'Stock'],
            $products->map(fn ($p) => [$p->name, $p->stock])
        );
    }
}
