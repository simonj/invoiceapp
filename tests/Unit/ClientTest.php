<?php

namespace Tests\Unit;

use App\Client;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientTest extends TestCase
{
    use DatabaseTransactions;
    use DatabaseMigrations;
    use WithoutMiddleware;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_can_create_client()
    {
        $user = factory(User::class)->create();

        $client = factory(Client::class)->create([
            'user_id' => $user->id
        ])->toArray();

        $response = $this->actingAs($user)
            ->call('POST', 'clients', $client);

        $response->assertStatus(200);
    }
}
