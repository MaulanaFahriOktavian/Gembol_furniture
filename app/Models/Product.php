<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id', 'name', 'slug', 'short_description', 'description',
        'price', 'discount_price', 'stock', 'sku', 'variants', 'finishes',
        'specifications', 'materials', 'images', 'weight', 'length', 'width', 'height', 
        'status', 'is_featured', 'view_count', 'sold_count', 'rating_average', 'review_count'
    ];

    protected function casts(): array
    {
        return [
            'images'          => 'array',
            'variants'        => 'array',
            'finishes'        => 'array',
            'specifications'  => 'array',
            'price'           => 'decimal:2',
            'discount_price'  => 'decimal:2',
            'is_featured'     => 'boolean',
            'weight'          => 'decimal:2',
            'length'          => 'decimal:2',
            'width'           => 'decimal:2',
            'height'          => 'decimal:2',
            'rating_average'  => 'decimal:2',
        ];
    }

    protected $appends = ['formatted_price', 'primary_image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Accessor untuk mengambil gambar pertama secara otomatis
    public function getPrimaryImageAttribute(): string
    {
        // Cek apakah images ada dan merupakan array, ambil yang pertama
        if (!empty($this->images) && is_array($this->images)) {
            return $this->images[0];
        }
        // Fallback jika kosong
        return asset('images/placeholder.jpg');
    }

    public function getFormattedPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    protected static function booted(): void
    {
        static::creating(function (Product $product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }
}