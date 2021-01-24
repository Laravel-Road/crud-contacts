<?php

namespace Tests\Feature\Contacts;

use App\Http\Livewire\Contacts\ContactList;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

/**
 * @group contacts
 * @group contactList
 */
class ContactListTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function canDisplayPaginateContact()
    {
        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        Contact::factory(30)->create();

        Livewire::withQueryParams(['page' => 2])
                ->test(ContactList::class)
                ->assertPayloadSet('page', 2);;
    }
}
