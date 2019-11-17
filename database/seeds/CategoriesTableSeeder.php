<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(\App\Category::class,20)->create();

        $categories = [
            [ 'name' =>'TECNOLOGIA'],
            [ 'name' =>'GAMING'],
            [ 'name' =>'CITAS'],
            [ 'name' =>'CONOCER'],
            [ 'name' =>'MUJERES'],
            [ 'name' =>'GENERAL'],
            [ 'name' =>'LECTURA'],
            [ 'name' =>'MEMES'],
            [ 'name' =>'FUTBOL'],
            [ 'name' =>'BEISBOL'],
            [ 'name' =>'BALONCESTO'],
            [ 'name' =>'AMISTAD'],
            [ 'name' =>'HOBBIES'],
            [ 'name' =>'MUSICA'],
            [ 'name' =>'ANIME'],
            [ 'name' =>'PELICULAS'],
            [ 'name' =>'AMOR'],
            [ 'name' =>'BELLEZA'],
            [ 'name' =>'CIENCIA'],
            [ 'name' =>'COMICS']
        ];

        foreach ($categories as $category){
            \App\Category::create($category);
        }
    }
}
