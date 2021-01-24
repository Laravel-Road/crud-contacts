<?php

namespace Tests\Feature\Contacts;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @group contact
 * @group indexContact
 */
class ContactIndexTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * @test
     */
    public function existComponentsContact()
    {
        $this->actingAs(User::factory()->withPersonalTeam()->create())
            ->get(route('contacts.index'))
            ->assertSeeLivewire('contacts.contact-new');
    }
}
