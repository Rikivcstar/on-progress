<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopeLowStock($query, $treshold = 10)
    {
        return $query->where('stock', '<', $treshold);
    }

    protected function formattedPrice(): Attribute
    {
        return Attribute::make(
            get: fn () => 'Rp' . number_format($this->price, 0, ',', '.')
        );
    }
}
