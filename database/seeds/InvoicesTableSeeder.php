<?php

use Illuminate\Database\Seeder;

class InvoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ClientInvoice::class, 50)->create()->each(function ($u) {
            $u->items()->save(factory(App\ClientInvoiceItem::class)->make([
                'client_invoice_id' => $u->id
            ]));
        });
    }
}
