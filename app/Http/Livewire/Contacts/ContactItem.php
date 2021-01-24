<?php

namespace App\Http\Livewire\Contacts;

use App\Models\Contact;
use Livewire\Component;

class ContactItem extends Component
{
    public Contact $contact;

    public bool $updating;

    public bool $destroying;

    public function edit(Contact $contact)
    {
        $this->clearValidation();

        $this->updating = true;

        $this->contact = $contact;
    }

    public function update()
    {
        $this->validate();

        $this->contact->save();

        $this->updating = false;

        $this->emit('refreshList');
    }

    public function confirmDeletion(Contact $contact)
    {
        $this->destroying = true;

        $this->contact = $contact;
    }

    public function destroy()
    {
        $this->contact->delete();

        $this->destroying = false;

        $this->emit('refreshList');
    }

    public function render()
    {
        return view('contacts.item');
    }

    protected function rules()
    {
        return [
            'contact.name' => 'required|string',
            'contact.email' => 'required|email',
            'contact.phone' => 'required|string|min:8',
            'contact.message' => 'required|string|min:10',
        ];
    }
}
