<?php

namespace Tests\Feature\Contacts;

use App\Http\Livewire\Contacts\ContactNew;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

/**
 * @group contacts
 * @group contactCreate
 */
class ContactCreateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function canCreateContact()
    {
        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        $contactFake = Contact::factory()
            ->make(['team_id' => $user->currentTeam->id]);

        Livewire::test(ContactNew::class)
            ->call('mount', $contactFake)
            ->call('store')
            ->assertEmitted('created')
            ->assertEmitted('refreshList');

        $this->assertDatabaseHas('contacts', $contactFake->toArray());
    }

    /**
     * @test
     */
    public function checkRequiredFieldsCreateContact()
    {
        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        Livewire::test(ContactNew::class)
            ->call('store')
            ->assertHasErrors([
                'newContact.name' => 'required',
                'newContact.email' => 'required',
                'newContact.phone' => 'required',
                'newContact.message' => 'required',
            ]);
    }

    /**
     * @test
     */
    public function cannotCreateInvalidEmailContact()
    {
        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        $contactFake = Contact::factory()
            ->make([
                'email' => 'invalid',
                'team_id' => $user->currentTeam->id,
            ]);

        Livewire::test(ContactNew::class)
            ->call('mount', $contactFake)
            ->call('store')
            ->assertHasErrors(['newContact.email' => 'email']);;
    }
}
