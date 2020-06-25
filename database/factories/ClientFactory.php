<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;


$factory->define(Client::class, function (Faker $faker) {
    $phoneNumber = rand(6270000000, 6279999999);

    return [
        'name'      => $faker->name(),
        'phone'     => strval($phoneNumber),
        'email'     => $faker->unique()->safeEmail,
        'address'   => $faker->address,
        'rfc'       => $faker->uuid
    ];
});
