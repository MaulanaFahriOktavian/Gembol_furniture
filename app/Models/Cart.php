<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',           // ← TAMBAHKAN INI
        'product_id',        // ← Pastikan ada
        'qty',               // ← Pastikan ada
        'variant',           // ← Pastikan ada
        'finish',            // ← Pastikan ada
        'price_at_time',     // ← Pastikan ada (harga saat checkout)
    ];

    protected $casts = [
        'qty' => 'integer',
        'price_at_time' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}