<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use App\Models\Product;

class Home extends Component
{
    public function render()
    {
        return view('livewire.customer.home', [
            'featuredProducts' => Product::with('category')
                ->where('status', 'active')
                ->where('is_featured', true)
                ->limit(4)
                ->get(),
        ])->layout('components.layouts.app');
    }
}