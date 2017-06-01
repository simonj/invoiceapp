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
        factory(App\Client_invoice::class, 50)->create()->each(function ($u) {
            $u->items()->save(factory(App\Client_invoiceItem::class)->make([
                'client_invoice_id' => $u->id
            ]));
        });
    }
}
