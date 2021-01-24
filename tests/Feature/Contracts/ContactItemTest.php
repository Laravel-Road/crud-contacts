<?php

namespace Tests\Feature\Contacts;

use App\Http\Livewire\Contacts\ContactItem;
use App\Models\Contact;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

/**
 * @group contacts
 * @group contactItem
 */
class ContactItemTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function canUpdateContact()
    {
        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        $contact = Contact::factory()
            ->create(['team_id' => $user->currentTeam->id]);

        $contact->name = 'update name';
        $contact->email = 'update@email.com';

        Livewire::test(ContactItem::class)
            ->call('edit', $contact)
            ->call('update')
            ->assertEmitted('refreshList');

        $this->assertDatabaseHas('contacts', [
            'name' => 'update name',
            'email' => 'update@email.com',
        ]);
    }

    /**
     * @test
     */
    public function canDestroyContact()
    {
        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        $contact = Contact::factory()
            ->create(['team_id' => $user->currentTeam->id]);

        Livewire::test(ContactItem::class)
            ->call('confirmDeletion', $contact)
            ->call('destroy')
            ->assertEmitted('refreshList');

        $this->assertDatabaseMissing('contacts', $contact->toArray());
    }

    /**
     * @test
     */
    public function cannotDestroyNonTeamContact()
    {
        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        $team = Team::factory()->create();

        $contact = Contact::factory()
            ->create(['team_id' => $team->id]);

        Livewire::test(ContactItem::class)
            ->call('confirmDeletion', $contact)
            ->assertForbidden();

        $this->assertDatabaseHas('contacts', $contact->getAttributes());
    }
}
