<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class Home extends Component
{
    public $featuredProducts = [];
    public $categories = [];

    public function mount()
    {
        $this->categories = Category::where('is_active', true)->limit(6)->get();
        
        // ✅ PERBAIKAN: Hapus 'images' dari with(). Cukup load 'category'.
        // Data 'images' akan otomatis tersedia karena ada di tabel products.
            $this->featuredProducts = Product::with('category')
                ->where('status', 'active')
                ->where('is_featured', true)
                ->orderBy('sold_count', 'desc')
                ->limit(8)
                ->get();
    }

    public function render()
{
    return view('livewire.customer.home', [
        'categories' => Category::where('is_active', true)->limit(6)->get(),
        'featuredProducts' => Product::with(['category'])
            ->where('status', 'active')
            ->where('is_featured', true)
            ->orderBy('sold_count', 'desc')
            ->limit(8)
            ->get(),
    ])->layout('layouts.app', [
        'title' => 'Premium Furniture',
        'meta_description' => 'Furniture premium handmade oleh pengrajin Indonesia.'
    ]);
}
}