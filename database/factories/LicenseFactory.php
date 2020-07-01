<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\License;
use Faker\Generator as Faker;

$factory->define(License::class, function (Faker $faker) {
    $status = ['activo', 'inactivo'];

    return [
        'client_id'         => rand(1, 20),
        'activation_date'   => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
        'due_date'          => $faker->dateTimeBetween($startDate = 'now', $endDate = '1 years', $timezone = null),
        'observations'      => $faker->sentence($nbWords = 15, $variableNbWords = true),
        'serial_number'     => $faker->unique()->creditCardNumber(),
        'system_id'         => rand(1, 4),
        'status'            => $faker->randomElement($status)
    ];
});
