<?php

namespace Tests\Unit;

use App\Client;
use App\ClientInvoice;
use App\ClientInvoiceItem;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class InvoiceTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;
    use WithoutMiddleware;

    public function test_user_can_see_invoice()
    {
        $client = factory(Client::class)->create();

        $invoice = factory(ClientInvoice::class)->create([
            'client_id' => $client->id
        ]);

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/invoices');

        $response->assertStatus(200);
    }

    public function test_user_can_create_invoice()
    {
        $user = factory(User::class)->create();

        $client = factory(Client::class)->create([
            'user_id' => $user->id
        ])->toArray();

        $invoice = factory(ClientInvoice::class)->create([
            'user_id'   => $user->id,
            'client_id' => $client['id'],
        ])->toArray();

        $invoiceItems = factory(ClientInvoiceItem::class, 2)->create([
            'client_invoice_id' => $invoice['id'],
        ])->toArray();

        $params = [
            'invoice' => $invoice,
            'client'  => $client,
            'items'   => $invoiceItems,
            'date'    => Carbon::now(),
            'amount'  => '100'
        ];

        $response = $this->actingAs($user)
            ->call('POST', '/invoices', $params);

        $response->assertStatus(200);
    }

    public function user_can_edit_invoice()
    {
        $this->markTestSkipped('will not run');
        $user = factory(User::class)->create();

        $invoice = factory(ClientInvoice::class)->create();

        $params = [
            'notes' => 'Updated notes',
        ];

        $response = $this->actingAs($user)
            ->call('PUT', 'invoices/'. $invoice->id, $params);

        $response->assertStatus(200);
    }

    public function test_user_can_delete_invoice()
    {
        $user = factory(User::class)->create();

        $client = factory(Client::class)->create();

        $invoice = factory(ClientInvoice::class)->create([
            'client_id' => $client->id
        ]);

        $response = $this->actingAs($user)->delete("invoices/{$invoice->id}");

        $response->assertStatus(200);
    }
}
