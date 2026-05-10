<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\CustomOrder;

class CustomRequest extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $phone;
    public $furniture_type;
    public $material;
    public $dimensions;
    public $style;
    public $budget;
    public $timeline;
    public $notes;
    public $images = [];

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'furniture_type' => 'required|string|max:255',
        'material' => 'nullable|string|max:255',
        'dimensions' => 'nullable|string|max:255',
        'style' => 'nullable|string|max:255',
        'budget' => 'nullable|string|max:255',
        'timeline' => 'nullable|string|max:255',
        'notes' => 'nullable|string',
        'images.*' => 'nullable|image|max:5120', // 5MB Max per image
    ];

    public function submit()
    {
        $this->validate();

        $imagePaths = [];
        foreach ($this->images as $image) {
            $imagePaths[] = $image->store('custom_requests', 'public');
        }

        $formattedDetails = "Furniture Type: " . $this->furniture_type . "\n"
            . "Material: " . $this->material . "\n"
            . "Dimensions: " . $this->dimensions . "\n"
            . "Style: " . $this->style . "\n"
            . "Timeline: " . $this->timeline . "\n\n"
            . "Additional Notes:\n" . $this->notes;

        CustomOrder::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'details' => $formattedDetails,
            'budget' => $this->budget,
            'status' => 'pending',
            'images' => $imagePaths,
        ]);

        $this->reset();
        
        $this->dispatch('notify', ['message' => 'Your custom request has been submitted successfully. Our team will contact you soon.', 'type' => 'success']);
    }

    public function render()
    {
        return view('livewire.customer.custom-request')
            ->layout('layouts.app', ['title' => 'Custom Request']);
    }
}
