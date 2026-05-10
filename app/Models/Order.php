<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     * ⚠️ Semua kolom yang bisa di-input via create()/update() wajib ada di sini
     */
    protected $fillable = [
        'user_id',
        'order_number',      // ← Nomor order unik (auto-generated)
        'name',              // Nama penerima
        'phone',             // No. WhatsApp
        'address',           // Alamat lengkap
        'notes',             // Catatan pesanan
        'subtotal',          // Total sebelum ongkir
        'shipping_cost',     // Ongkos kirim
        'total',             // Grand total
        'status',            // pending, processing, shipped, completed, cancelled
        'payment_status',    // unpaid, paid, refunded, cancelled
        'payment_method',    // transfer, cod, qris, etc.
        'transaction_id',    // ID dari payment gateway (opsional)
        'shipped_at',        // Timestamp saat dikirim
        'completed_at',      // Timestamp saat selesai
        'cancel_reason',     // Alasan pembatalan
    ];

    /**
     * The attributes that should be cast.
     * Memastikan tipe data konsisten saat diakses
     */
    protected function casts(): array
    {
        return [
            'subtotal' => 'decimal:2',
            'shipping_cost' => 'decimal:2',
            'total' => 'decimal:2',
            'shipped_at' => 'datetime',
            'completed_at' => 'datetime',
        ];
    }

    /**
     * The attributes that should be appended to arrays.
     * Menambahkan accessor otomatis ke output JSON/Array
     */
    protected $appends = [
        'formatted_total',
        'status_label',
    ];

    /*
    |--------------------------------------------------------------------------
    | 🔗 RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class)->with('product');
    }

    /*
    |--------------------------------------------------------------------------
    | 🎨 ACCESSORS (Computed Attributes)
    |--------------------------------------------------------------------------
    */

    /**
     * Format total menjadi Rupiah
     * Usage: $order->formatted_total → "Rp 12.500.000"
     */
    public function getFormattedTotalAttribute(): string
    {
        return 'Rp ' . number_format($this->total, 0, ',', '.');
    }

    /**
     * Label status dengan warna untuk UI
     * Usage: $order->status_label → ['text' => 'Pending', 'color' => 'yellow']
     */
    public function getStatusLabelAttribute(): array
    {
        $labels = [
            'pending'    => ['text' => 'Menunggu Konfirmasi', 'color' => 'yellow'],
            'processing' => ['text' => 'Diproses', 'color' => 'blue'],
            'shipped'    => ['text' => 'Dikirim', 'color' => 'purple'],
            'completed'  => ['text' => 'Selesai', 'color' => 'green'],
            'cancelled'  => ['text' => 'Dibatalkan', 'color' => 'red'],
        ];
        return $labels[$this->status] ?? ['text' => ucfirst($this->status), 'color' => 'gray'];
    }

    /*
    |--------------------------------------------------------------------------
    | ⚙️ AUTO-GENERATE ORDER NUMBER
    |--------------------------------------------------------------------------
    */

    /**
     * Generate nomor order unik: ORD-20260504-0001
     * Format: ORD-{YYYYMMDD}-{4-digit sequence}
     */
    public static function generateOrderNumber(): string
    {
        $prefix = 'ORD';
        $date = date('Ymd');
        
        // Hitung jumlah order hari ini + 1 untuk sequence
        $count = static::whereDate('created_at', today())->count() + 1;
        
        return sprintf('%s-%s-%04d', $prefix, $date, $count);
    }

    /**
     * Boot method: Dipanggil otomatis saat model di-inisialisasi
     * Auto-fill order_number sebelum insert ke database
     */
    protected static function booted(): void
    {
        static::creating(function ($order) {
            if (empty($order->order_number)) {
                $order->order_number = static::generateOrderNumber();
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | 🔍 QUERY SCOPES (Optional but Recommended)
    |--------------------------------------------------------------------------
    */

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopePaid($query)
    {
        return $query->where('payment_status', 'paid');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeToday($query)
    {
        return $query->whereDate('created_at', today());
    }

    /*
    |--------------------------------------------------------------------------
    | ✅ HELPER METHODS
    |--------------------------------------------------------------------------
    */

    /**
     * Cek apakah order sudah dibayar
     */
    public function isPaid(): bool
    {
        return $this->payment_status === 'paid';
    }

    /**
     * Cek apakah order sudah selesai
     */
    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }

    /**
     * Cek apakah order bisa dibatalkan
     */
    public function canBeCancelled(): bool
    {
        return in_array($this->status, ['pending', 'processing']);
    }

    /**
     * Update status order dengan validasi
     */
    public function updateStatus(string $newStatus): bool
    {
        $validStatuses = ['pending', 'processing', 'shipped', 'completed', 'cancelled'];
        
        if (!in_array($newStatus, $validStatuses)) {
            return false;
        }

        $this->status = $newStatus;
        
        // Auto-set timestamp untuk status tertentu
        if ($newStatus === 'shipped' && !$this->shipped_at) {
            $this->shipped_at = now();
        }
        if ($newStatus === 'completed' && !$this->completed_at) {
            $this->completed_at = now();
        }
        
        return $this->save();
    }
}