<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CustomOrder;

class CustomOrders extends Component
{
    use WithPagination;

    public $search = '';
    public $statusFilter = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function updateStatus($id, $status)
    {
        $order = CustomOrder::findOrFail($id);
        $order->update(['status' => $status]);
        session()->flash('message', 'Custom order status updated.');
    }

    public function render()
    {
        $query = CustomOrder::where(function($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%')
                  ->orWhere('phone', 'like', '%' . $this->search . '%');
            });

        if ($this->statusFilter) {
            $query->where('status', $this->statusFilter);
        }

        $customOrders = $query->latest()->paginate(10);

        return view('livewire.admin.custom-orders', [
            'customOrders' => $customOrders
        ])->layout('layouts.admin', ['title' => 'Custom Orders Requests']);
    }
}
