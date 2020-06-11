<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name'      => $faker->name(),
        'phone'     => $faker->e164PhoneNumber,
        'email'     => $faker->unique()->safeEmail,
        'address'   => $faker->address,
        'rfc'       => $faker->uuid
    ];
});
