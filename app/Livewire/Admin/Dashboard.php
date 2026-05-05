<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class Dashboard extends Component
{
    public $stats = [];
    public $recentOrders = [];

    public function mount()
    {
        // Hitung statistik
        $this->stats = [
            'total_revenue' => Order::sum('total'),
            'total_orders' => Order::count(),
            'total_products' => Product::count(),
            'total_customers' => User::whereHas('roles', function($q) { $q->where('name', 'customer'); })->count(),
        ];

        // Ambil 5 pesanan terakhir
        $this->recentOrders = Order::with('user')->latest()->take(5)->get();
    }

    public function render()
    {
        return view('livewire.admin.dashboard')->layout('layouts.admin', ['title' => 'Dashboard Overview']);
    }
}