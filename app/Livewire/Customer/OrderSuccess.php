<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use App\Models\Order;

class OrderSuccess extends Component
{
    public $order;
    public $whatsappMessage = '';

    public function mount($orderId)
    {
        $this->order = Order::with('orderItems.product')->findOrFail($orderId);
        
        // Generate WhatsApp message
        $items = '';
        foreach ($this->order->orderItems as $item) {
            $variant = $item->variant ? " ({$item->variant})" : '';
            $finish = $item->finish ? " - {$item->finish}" : '';
            $items .= "• {$item->name}{$variant}{$finish} × {$item->qty} = Rp " . number_format($item->price * $item->qty, 0, ',', '.') . "\n";
        }

        $this->whatsappMessage = urlencode(
            "Halo VoktaStyle, saya ingin konfirmasi pesanan:\n\n" .
            "📦 *Order #{$this->order->id}*\n" .
            "👤 {$this->order->name}\n" .
            "📱 {$this->order->phone}\n" .
            "📍 {$this->order->address}\n\n" .
            "🛒 *Detail Pesanan:*\n" .
            "{$items}\n" .
            "💰 *Total: Rp " . number_format($this->order->total, 0, ',', '.') . "*\n\n" .
            "Mohon info untuk langkah pembayaran. Terima kasih! 🙏"
        );
    }

    public function render()
    {
        return view('livewire.customer.order-success')
            ->layout('layouts.app', ['title' => 'Pesanan Berhasil']);
    }
}