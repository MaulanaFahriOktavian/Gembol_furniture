<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;

class Testimonials extends Component
{
    use WithFileUploads, WithPagination;

    public $search = '';
    public $showModal = false;
    public $editId = null;
    
    // Form fields
    public $customer_name;
    public $role;
    public $rating = 5;
    public $content;
    public $image;
    public $is_active = true;
    public $existingImage;

    protected $rules = [
        'customer_name' => 'required|string|max:255',
        'role' => 'nullable|string|max:255',
        'rating' => 'required|integer|min:1|max:5',
        'content' => 'required|string',
        'is_active' => 'boolean',
        'image' => 'nullable|image|max:2048',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function openCreateModal()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function openEditModal($id)
    {
        $this->resetForm();
        $testimonial = Testimonial::findOrFail($id);
        $this->editId = $testimonial->id;
        $this->customer_name = $testimonial->customer_name;
        $this->role = $testimonial->role;
        $this->rating = $testimonial->rating;
        $this->content = $testimonial->content;
        $this->is_active = $testimonial->is_active;
        $this->existingImage = $testimonial->image_path;
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

        $data = [
            'customer_name' => $this->customer_name,
            'role' => $this->role,
            'rating' => $this->rating,
            'content' => $this->content,
            'is_active' => $this->is_active,
        ];

        if ($this->image) {
            if ($this->editId && $this->existingImage) {
                Storage::disk('public')->delete($this->existingImage);
            }
            $data['image_path'] = $this->image->store('testimonials', 'public');
        }

        if ($this->editId) {
            Testimonial::where('id', $this->editId)->update($data);
            session()->flash('message', 'Testimonial updated successfully.');
        } else {
            Testimonial::create($data);
            session()->flash('message', 'Testimonial added successfully.');
        }

        $this->closeModal();
    }

    public function delete($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        if ($testimonial->image_path) {
            Storage::disk('public')->delete($testimonial->image_path);
        }
        $testimonial->delete();
        session()->flash('message', 'Testimonial deleted successfully.');
    }

    public function toggleStatus($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->update(['is_active' => !$testimonial->is_active]);
    }

    private function resetForm()
    {
        $this->editId = null;
        $this->customer_name = '';
        $this->role = '';
        $this->rating = 5;
        $this->content = '';
        $this->is_active = true;
        $this->image = null;
        $this->existingImage = null;
        $this->resetValidation();
    }

    public function render()
    {
        $testimonials = Testimonial::where('customer_name', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate(10);

        return view('livewire.admin.testimonials', [
            'testimonials' => $testimonials
        ])->layout('layouts.admin', ['title' => 'Testimonials Management']);
    }
}
