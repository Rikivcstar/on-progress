<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */

    public function creating(Product $product)
    {
         if(empty($product->slug)){
            $product->slug = Str::slug($product->name);
        }

    }
    public function created(Product $product): void
    {
        logger("Product Baru Di Buat : {$product->name}");
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        if ($product->wasChanged('stock')) {
            logger("Stok {$product->name} berubah jadi {$product->stock}");
        }
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
