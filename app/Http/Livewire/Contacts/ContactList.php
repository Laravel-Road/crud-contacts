<?php

namespace App\Http\Livewire\Contacts;

use App\Models\Contact;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class ContactList extends Component
{
    use AuthorizesRequests;

    use WithPagination;

    protected $listeners = ['refreshList' => '$refresh'];

    public function getListProperty()
    {
        $this->authorize('viewAny', Contact::class);

        return Contact::orderBy('id', 'desc')->paginate();
    }

    public function render()
    {
        return view('contacts.list');
    }
}
