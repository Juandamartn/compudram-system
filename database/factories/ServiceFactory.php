<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    $pcs = ['acer', 'hp', 'lenovo', 'dell', 'asus'];
    $status = ['activo', 'inactivo'];

    return [
        'name'              => $faker->sentence(),
        'owner'             => $faker->name(),
        'brand_pc'          => $faker->randomElement($pcs),
        'receipt_date'      => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
        'delivery_date'     => $faker->dateTimeBetween($startDate = 'now', $endDate = '1 years', $timezone = null),
        'description'       => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'accesories'        => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'charge'            => rand(100, 400),
        'status'            => $faker->randomElement($status)
    ];
});
