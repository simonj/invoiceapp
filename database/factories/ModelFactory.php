<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name'           => $faker->name,
        'email'          => 'asd@asd.dk',
        'password'       => $password ?: $password = bcrypt('asd123'),
        'remember_token' => str_random(10),
    ];
});

// Add clients
$factory->define(App\Client::class, function (Faker\Generator $faker) {
    return [
        'company'        => $faker->company,
        'email'          => $faker->email,
        'address1'       => $faker->address,
        'city'           => $faker->city,
        'state'          => $faker->state,
        'zipcode'        => $faker->postcode,
        'country'        => $faker->country,
        'contact_person' => $faker->firstName,
        'user_id'        => 1
    ];
});

// Add invoices
$factory->define(App\Client_invoice::class, function (Faker\Generator $faker) {
    return [
        'reference_key' => str_random(60),
        'client_id'     => $faker->randomDigitNotNull,
        'user_id'       => 1,
        'due_date'      => $faker->dateTimeThisCentury,
        'status'        => 'created',
        'notes'         => $faker->paragraph,
        'amount'        => $faker->randomFloat(),
        'paid'          => false,
    ];
});

// Add invoices items
$factory->define(App\Client_invoiceItem::class, function (Faker\Generator $faker) {
    return [
        'quantity'    => $faker->randomDigitNotNull,
        'description' => $faker->sentence(10),
        'price'       => $faker->randomFloat(),
    ];
});
