<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Product;

class ProductDetail extends Component
{
    public Product $product;
    public $activeImageIndex = 0;
    public $selectedVariant = '';
    public $selectedFinish = '';
    public $qty = 1;

    public function mount($slug)
    {
        $this->product = Product::with(['category', 'images', 'reviews' => fn($q) => $q->where('is_approved', true)->latest()])
            ->where('slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();

        $this->selectedVariant = $this->product->variants[0] ?? 'Default';
        $this->selectedFinish = $this->product->finishes[0] ?? 'Standard';
    }

    public function changeImage($index) { $this->activeImageIndex = $index; }
    public function selectVariant($variant) { $this->selectedVariant = $variant; }
    public function selectFinish($finish) { $this->selectedFinish = $finish; }

    public function changeQty($delta)
    {
        $newQty = $this->qty + $delta;
        $this->qty = max(1, min($newQty, $this->product->stock, 10));
    }

    #[On('cart:add-from-detail')]
    public function addToCart()
    {
        if ($this->qty > $this->product->stock) {
            $this->dispatch('notify', message: '⚠️ Stok tidak mencukupi!', type: 'error');
            return;
        }

        $this->dispatch('cart:add',
            productId: $this->product->id,
            qty: $this->qty,
            variant: $this->selectedVariant,
            finish: $this->selectedFinish
        );
    }

    public function render()
    {
        return view('livewire.customer.product-detail')
            ->layout('layouts.app', ['title' => $this->product->name . ' | VoktaStyle']);
    }
}