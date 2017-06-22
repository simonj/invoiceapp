<?php

namespace Tests\Unit;

use App\Client;
use App\ClientInvoice;
use App\ClientInvoiceItem;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class InvoiceTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
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
            'date' => Carbon::now(),
            'amount' => '100'
        ];

        $response = $this->actingAs($user)
            ->call('POST', '/invoices', $params);

        $response->assertStatus(200);
    }
}
