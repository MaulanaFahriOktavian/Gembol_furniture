<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Products extends Component
{
    use WithFileUploads;

    public $products, $categories;
    public $search = '', $statusFilter = 'all', $categoryFilter = '';

    // Modal State
    public $showModal = false;
    public $editId = null;
    public $name, $category_id, $price, $stock, $description, $status = 'active';
    public $images = [];
    public $existingImages = [];

    protected $rules = [
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'description' => 'nullable|string',
        'status' => 'required|in:draft,active,archived',
        'images.*' => 'nullable|image|max:2048',
    ];

    public function mount()
    {
        $this->categories = Category::all();
        $this->loadProducts();
    }

    public function loadProducts()
    {
        $query = Product::with('category');

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }
        if ($this->statusFilter !== 'all') {
            $query->where('status', $this->statusFilter);
        }
        if ($this->categoryFilter) {
            $query->where('category_id', $this->categoryFilter);
        }

        $this->products = $query->latest()->paginate(10);
    }

    public function updated($property)
    {
        if (in_array($property, ['search', 'statusFilter', 'categoryFilter'])) {
            $this->loadProducts();
        }
    }

    public function openCreateModal()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function openEditModal($id)
    {
        $this->resetForm();
        $product = Product::findOrFail($id);
        $this->editId = $product->id;
        $this->name = $product->name;
        $this->category_id = $product->category_id;
        $this->price = $product->price;
        $this->stock = $product->stock;
        $this->description = $product->description;
        $this->status = $product->status;
        $this->existingImages = $product->images ?? [];
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function save()
    {
        $this->validate();

        $slug = Str::slug($this->name);
        $imagePaths = $this->existingImages;

        foreach ($this->images as $image) {
            $imagePaths[] = $image->store('products', 'public');
        }

        $data = [
            'name' => $this->name,
            'slug' => $slug,
            'category_id' => $this->category_id,
            'price' => $this->price,
            'stock' => $this->stock,
            'description' => $this->description,
            'status' => $this->status,
            'images' => array_filter($imagePaths),
        ];

        if ($this->editId) {
            Product::where('id', $this->editId)->update($data);
            session()->flash('message', '✅ Produk berhasil diperbarui!');
        } else {
            Product::create($data);
            session()->flash('message', '✅ Produk berhasil ditambahkan!');
        }

        $this->closeModal();
        $this->loadProducts();
    }

    public function delete($id)
    {
        if (!confirm('Yakin ingin menghapus produk ini? Gambar juga akan dihapus permanen.')) return;

        $product = Product::findOrFail($id);
        if ($product->images) {
            foreach ($product->images as $img) {
                Storage::disk('public')->delete($img);
            }
        }
        $product->delete();
        session()->flash('message', '🗑️ Produk berhasil dihapus!');
        $this->loadProducts();
    }

    private function resetForm()
    {
        $this->editId = null;
        $this->name = '';
        $this->category_id = '';
        $this->price = '';
        $this->stock = '';
        $this->description = '';
        $this->status = 'active';
        $this->images = [];
        $this->existingImages = [];
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.admin.products')
            ->layout('layouts.admin', ['title' => 'Manajemen Produk']);
    }
}