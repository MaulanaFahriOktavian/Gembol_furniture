<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use App\Models\Contact;

class ContactPage extends Component
{
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $message;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:20',
        'subject' => 'nullable|string|max:255',
        'message' => 'required|string',
    ];

    public function submit()
    {
        $this->validate();

        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'message' => $this->message,
            'is_read' => false,
        ]);

        $this->reset(['name', 'email', 'phone', 'subject', 'message']);
        
        $this->dispatch('notify', ['message' => 'Your message has been sent successfully. We will get back to you soon!', 'type' => 'success']);
    }

    public function render()
    {
        return view('livewire.customer.contact-page')
            ->layout('layouts.app', ['title' => 'Contact Us']);
    }
}
