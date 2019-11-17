<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

// NO ES CON RANDOM, HAY INSERTARLOS UNO A UNO..(LO MISMO CON CATEGORY
$factory->define(Category::class, function (Faker $faker) {
    $title = $faker->randomElement([
        'TECNOLOGIA',
        'GAMING',
        'CITAS',
        'CONOCER',
        'MUJERES',
        'GENERAL',
        'LECTURA',
        'MEMES',
        'FUTBOL',
        'BEISBOL',
        'BALONCESTO',
        'AMISTAD',
        'HOBBIES',
        'MUSICA',
        'ANIME',
        'PELICULAS',
        'AMOR',
        'BELLEZA',
        'CIENCIA',
        'COMICS'

    ]);
    return [
        'name' => $title,
    ];
});
