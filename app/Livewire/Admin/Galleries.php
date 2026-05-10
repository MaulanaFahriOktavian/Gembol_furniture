<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class Galleries extends Component
{
    use WithFileUploads, WithPagination;

    public $search = '';
    public $showModal = false;
    public $editId = null;
    
    // Form fields
    public $title;
    public $description;
    public $image;
    public $is_active = true;
    public $existingImage;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
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
        $gallery = Gallery::findOrFail($id);
        $this->editId = $gallery->id;
        $this->title = $gallery->title;
        $this->description = $gallery->description;
        $this->is_active = $gallery->is_active;
        $this->existingImage = $gallery->image_path;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function save()
    {
        if (!$this->editId) {
            $this->rules['image'] = 'required|image|max:2048';
        }
        
        $this->validate();

        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'is_active' => $this->is_active,
        ];

        if ($this->image) {
            if ($this->editId && $this->existingImage) {
                Storage::disk('public')->delete($this->existingImage);
            }
            $data['image_path'] = $this->image->store('gallery', 'public');
        }

        if ($this->editId) {
            Gallery::where('id', $this->editId)->update($data);
            session()->flash('message', 'Gallery item updated successfully.');
        } else {
            Gallery::create($data);
            session()->flash('message', 'Gallery item added successfully.');
        }

        $this->closeModal();
    }

    public function delete($id)
    {
        $gallery = Gallery::findOrFail($id);
        if ($gallery->image_path) {
            Storage::disk('public')->delete($gallery->image_path);
        }
        $gallery->delete();
        session()->flash('message', 'Gallery item deleted successfully.');
    }

    public function toggleStatus($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->update(['is_active' => !$gallery->is_active]);
    }

    private function resetForm()
    {
        $this->editId = null;
        $this->title = '';
        $this->description = '';
        $this->is_active = true;
        $this->image = null;
        $this->existingImage = null;
        $this->resetValidation();
    }

    public function render()
    {
        $galleries = Gallery::where('title', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate(10);

        return view('livewire.admin.galleries', [
            'galleries' => $galleries
        ])->layout('layouts.admin', ['title' => 'Gallery Management']);
    }
}
