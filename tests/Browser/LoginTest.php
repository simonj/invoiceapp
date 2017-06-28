<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    public function testLogin()
    {
        $user = factory(User::class)->create([
            'email' => 'simon@gmail.com'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email);
//                ->type('password', 'secret');
//                ->press('Login')
//                ->assertPathIs('/home');
        });
    }
}
