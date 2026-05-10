<?php

namespace App\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class OrderManagement extends Component
{
    use WithPagination;

    public $statusFilter = '';

    public function updateStatus($orderId, $newStatus)
    {
        $order = Order::find($orderId);
        if ($order) {
            $order->updateStatus($newStatus);
            session()->flash('message', "Pesanan #{$order->order_number} berhasil diperbarui.");
        }
    }

    public function render()
    {
        $orders = Order::query()
            ->when($this->statusFilter, fn($q) => $q->where('status', $this->statusFilter))
            ->latest()
            ->paginate(10);

        return view('livewire.admin.order-management', [
            'orders' => $orders
        ]);
    }
}