<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Checkout extends Component
{
    public $cartItems = [];
    public $subtotal = 0;
    public $shippingCost = 0;
    public $grandTotal = 0;

    // Form Data
    public $name = '';
    public $phone = '';
    public $address = '';
    public $notes = '';

    public function mount()
    {
        // 1. Ambil data keranjang (Login vs Guest)
        if (Auth::check()) {
            $this->cartItems = Cart::where('user_id', Auth::id())->get();
        } else {
            $this->cartItems = collect(Session::get('guest_cart', []))->values();
        }

        // Redirect jika kosong
        if ($this->cartItems->isEmpty()) {
            return redirect()->route('home')->with('message', 'Keranjang Anda kosong!');
        }

        // 2. Hitung Total
        $this->subtotal = $this->cartItems->sum(function ($item) {
            $price = is_array($item) ? ($item['price'] ?? 0) : ($item->product->price ?? 0);
            $qty = is_array($item) ? ($item['qty'] ?? 0) : ($item->qty ?? 0);
            return $price * $qty;
        });

        $this->grandTotal = $this->subtotal + $this->shippingCost;

        // 3. Pre-fill data user jika sudah login
        if (Auth::check()) {
            $user = Auth::user();
            $this->name = $user->name;
            $this->phone = $user->phone ?? '';
            $this->address = $user->address ?? '';
        }
    }

    public function placeOrder()
    {
        // Validasi sederhana
        if (empty($this->name) || empty($this->phone) || empty($this->address)) {
            $this->dispatch('notify', message: 'Mohon lengkapi data pengiriman', type: 'error');
            return;
        }

        DB::transaction(function () {
            // A. Buat Order
            $order = Order::create([
                'user_id' => Auth::id(),
                'name' => $this->name,
                'phone' => $this->phone,
                'address' => $this->address,
                'notes' => $this->notes,
                'subtotal' => $this->subtotal,
                'shipping_cost' => $this->shippingCost,
                'total' => $this->grandTotal,
                'status' => 'pending',
                'payment_status' => 'unpaid',
            ]);

            // B. Masukkan Item ke Order_Items
            foreach ($this->cartItems as $item) {
                $isGuest = is_array($item);
                
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $isGuest ? ($item['id'] ?? null) : $item->product_id,
                    'name' => $isGuest ? ($item['name'] ?? 'Produk') : $item->product->name,
                    'price' => $isGuest ? ($item['price'] ?? 0) : $item->product->price,
                    'qty' => $isGuest ? ($item['qty'] ?? 1) : $item->qty,
                    'variant' => $isGuest ? ($item['variant'] ?? '') : ($item->variant ?? ''),
                    'finish' => $isGuest ? ($item['finish'] ?? '') : ($item->finish ?? ''),
                ]);
            }

            // C. Kosongkan Keranjang
            if (Auth::check()) {
                Cart::where('user_id', Auth::id())->delete();
            } else {
                Session::forget('guest_cart');
            }
        });

        // D. Redirect ke halaman sukses (atau WhatsApp)
        // Ganti dengan route success Anda nanti
        return redirect()->route('order.success', $order->id);
    }

    public function render()
    {
        return view('livewire.customer.checkout')->layout('layouts.app', ['title' => 'Checkout']);
    }
}