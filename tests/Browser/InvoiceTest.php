<?php

namespace Tests\Browser;

use App\ClientInvoice;
use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\DuskServiceProvider;


class InvoiceTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_user_can_see_invoices()
    {
        $invoice = factory(ClientInvoice::class)->create();

        $this->browse(function (Browser $browser) use ($invoice) {
            $browser
                ->type('email', 'test')
                ->type('password', 'secret')
                ->press('Login')
            ->screenshot('test')
            ;

        });
    }
}
