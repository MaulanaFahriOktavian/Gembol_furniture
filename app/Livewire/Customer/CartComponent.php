<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CartComponent extends Component
{
    public $cartItems = [];
    public $subtotal = 0;
    public $totalQty = 0;

    // Listener untuk event dari frontend
#[On('cart:add')]
public function addToCart($id, $qty = 1, $variant = '', $finish = '', $name = '', $price = 0, $img = '')
{
    // Untuk Guest Cart
    if (!auth()->check()) {
        $cart = session('guest_cart', []);
        $key = "{$id}_{$variant}_{$finish}";
        
        if (isset($cart[$key])) {
            $cart[$key]['qty'] += $qty;
        } else {
            $cart[$key] = [
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'img' => $img,
                'qty' => $qty,
                'variant' => $variant,
                'finish' => $finish
            ];
        }
        session(['guest_cart' => $cart]);
        $this->loadCart();
        $this->dispatch('notify', message: '✅ Ditambahkan ke keranjang', type: 'success');
        return;
    }

    // ✅ Untuk User Login: Gunakan logika yang benar
    $product = \App\Models\Product::findOrFail($id);
    
    // Cari cart item yang sudah ada
    $cartItem = \App\Models\Cart::where('user_id', auth()->id())
        ->where('product_id', $id)
        ->where('variant', $variant)
        ->where('finish', $finish)
        ->first();

    if ($cartItem) {
        // Jika ada, increment qty
        $cartItem->qty += $qty;
        $cartItem->save();
    } else {
        // Jika belum ada, buat baru
        \App\Models\Cart::create([
            'user_id' => auth()->id(),
            'product_id' => $id,
            'qty' => $qty,
            'variant' => $variant,
            'finish' => $finish,
            'price_at_time' => $product->price
        ]);
    }
    
    $this->loadCart();
    $this->dispatch('notify', message: '✅ ' . $product->name . ' ditambahkan', type: 'success');
}
    #[On('cart:remove')]
    public function removeItem($index)
    {
        if (auth()->check()) {
            $this->cartItems[$index]?->delete();
        } else {
            $cart = session('guest_cart', []);
            $keys = array_keys($cart);
            if (isset($keys[$index])) unset($cart[$keys[$index]]);
            session(['guest_cart' => $cart]);
        }
        $this->loadCart();
        $this->dispatch('notify', message: 'Produk dihapus dari keranjang', type: 'info');
    }

    public function updateQty($index, $qty)
    {
        $qty = max(1, min($qty, 10)); // Batasi 1-10
        if (auth()->check()) {
            $item = $this->cartItems[$index] ?? null;
            if ($item) {
                $item->qty = $qty;
                $item->save();
            }
        } else {
            $cart = session('guest_cart', []);
            $keys = array_keys($cart);
            if (isset($keys[$index])) $cart[$keys[$index]]['qty'] = $qty;
            session(['guest_cart' => $cart]);
        }
        $this->loadCart();
    }

public function loadCart()
{
    if (auth()->check()) {
        // ✅ HAPUS '.primaryImage' - cukup load 'product' saja
        $this->cartItems = Cart::with('product')
            ->where('user_id', auth()->id())
            ->get();
    } else {
        $this->cartItems = collect(session('guest_cart', []))->values();
    }

    $this->totalQty = $this->cartItems->sum('qty');
    $this->subtotal = $this->cartItems->sum(fn($i) => ($i['price'] ?? $i->product?->price ?? 0) * $i['qty']);
}

    public function mount() { $this->loadCart(); }

    public function render()
    {
        return view('livewire.customer.cart-sidebar');
    }
}