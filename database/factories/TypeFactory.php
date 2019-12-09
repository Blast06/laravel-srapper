<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Type;
use Faker\Generator as Faker;

$factory->define(Type::class, function (Faker $faker) {

    $title = $faker->randomElement([
        'WHATSAPP',
        'FACEBOOK',
        'DISCORD',
        'TELEGRAM',
    ]);
    return [
        'name' => $title,
    ];

});
