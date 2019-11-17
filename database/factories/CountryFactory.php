<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Country;
use Faker\Generator as Faker;

$factory->define(Country::class, function (Faker $faker) {
    $title = $faker->randomElement([
        'USA',
        'ESPANA',
        'EL SALVADOR',
        'CANADA',
        'REPUBLICA DOMINICANA',
        'HAITI',
        'MEXICO',
        'PUERTO RICO',
        'DINAMARCA',
        'HAWAII',
    ]);
    return [
        'name' => $title,
    ];
});
