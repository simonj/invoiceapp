<?php

namespace Tests\Unit;

use App\Client;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use DatabaseTransactions;
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function test_user_can_see_client()
    {
        $client = factory(Client::class)->create();

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/clients');

        $response->assertStatus(200);
    }

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

    public function test_user_can_edit_client()
    {
        $user = factory(User::class)->create();

        $client = factory(Client::class)->create([
            'user_id' => $user->id
        ]);

        $params = [
            'company' => 'Updated company name',
            'email'   => 'new@email.dk'
        ];

        $response = $this->actingAs($user)
            ->call('PUT', 'clients/'. $client->id, $params);

        $response->assertStatus(200);
    }

    public function test_user_can_delete_client()
    {
        $user = factory(User::class)->create();

        $client = factory(Client::class)->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->delete("clients/{$client->id}");

        $response->assertStatus(200);
    }

}
