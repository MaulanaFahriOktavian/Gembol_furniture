<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;

class ProductsCatalog extends Component
{
    use WithPagination;

    public $search = '';
    public $category = '';
    public $sort = 'latest';

    protected $queryString = ['search', 'category', 'sort'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Product::with('category')->where('status', 'active');

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if ($this->category) {
            $query->where('category_id', $this->category);
        }

        if ($this->sort === 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($this->sort === 'price_desc') {
            $query->orderBy('price', 'desc');
        } else {
            $query->latest();
        }

        return view('livewire.customer.products-catalog', [
            'products' => $query->paginate(12),
            'categories' => Category::all(),
        ])->layout('components.layouts.app', ['title' => 'Collections - BeWood']);
    }
}
