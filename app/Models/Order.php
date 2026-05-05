<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    // ✅ TAMBAHKAN SEMUA KOLOM YANG BOLEH DI-MASS ASSIGN
    protected $fillable = [
        'user_id',           // ← WAJIB (ini yang error)
        'name',              // Nama penerima
        'phone',             // No. WhatsApp
        'address',           // Alamat lengkap
        'notes',             // Catatan pesanan
        'subtotal',          // Harga sebelum ongkir
        'shipping_cost',     // Ongkos kirim
        'total',             // Total akhir
        'status',            // pending, processing, shipped, completed
        'payment_status',    // unpaid, paid, cancelled
        'payment_method',    // transfer, cod, etc.
        'transaction_id',    // ID dari payment gateway (opsional)
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'shipping_cost' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    // 🔗 Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}