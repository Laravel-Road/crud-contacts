<?php

namespace App\Http\Livewire\Contacts;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactList extends Component
{
    use WithPagination;

    protected $listeners = ['refreshList' => '$refresh'];

    public function getListProperty()
    {
        return Contact::orderBy('id', 'desc')->paginate();
    }

    public function render()
    {
        return view('contacts.list');
    }
}
