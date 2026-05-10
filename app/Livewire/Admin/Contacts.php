<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Contact;

class Contacts extends Component
{
    use WithPagination;

    public $search = '';
    public $filterRead = '';
    public $viewingContact = null;
    public $showModal = false;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterRead()
    {
        $this->resetPage();
    }

    public function viewContact($id)
    {
        $contact = Contact::findOrFail($id);
        $this->viewingContact = $contact;
        
        if (!$contact->is_read) {
            $contact->update(['is_read' => true]);
        }
        
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->viewingContact = null;
    }

    public function delete($id)
    {
        Contact::findOrFail($id)->delete();
        session()->flash('message', 'Message deleted successfully.');
        
        if ($this->viewingContact && $this->viewingContact->id === $id) {
            $this->closeModal();
        }
    }

    public function markAsUnread($id)
    {
        Contact::findOrFail($id)->update(['is_read' => false]);
        session()->flash('message', 'Message marked as unread.');
        $this->closeModal();
    }

    public function render()
    {
        $query = Contact::where(function($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%')
                  ->orWhere('subject', 'like', '%' . $this->search . '%');
            });

        if ($this->filterRead !== '') {
            $query->where('is_read', $this->filterRead === 'read');
        }

        $contacts = $query->latest()->paginate(10);

        return view('livewire.admin.contacts', [
            'contacts' => $contacts
        ])->layout('layouts.admin', ['title' => 'Messages']);
    }
}
