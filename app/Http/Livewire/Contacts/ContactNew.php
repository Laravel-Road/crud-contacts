<?php

namespace App\Http\Livewire\Contacts;

use App\Models\Contact;
use Livewire\Component;

class ContactNew extends Component
{
    public Contact $newContact;

    public function mount(Contact $contact)
    {
        $this->newContact = $contact;
    }

    public function store()
    {
        $this->validate();

        $this->newContact->save();

        $this->newContact = new Contact();

        $this->emit('created');
    }

    public function render()
    {
        return view('contacts.new');
    }

    protected function rules()
    {
        return [
            'newContact.name' => 'required|string',
            'newContact.email' => 'required|email',
            'newContact.phone' => 'required|string|min:8',
            'newContact.message' => 'required|string|min:10',
        ];
    }
}
