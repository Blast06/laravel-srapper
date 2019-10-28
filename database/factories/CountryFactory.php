<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Country;
use Faker\Generator as Faker;

$factory->define(Country::class, function (Faker $faker) {
    $title = $faker->sentence(4);
    return [
        'name' => $title,
    ];
});
