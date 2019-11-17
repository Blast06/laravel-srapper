<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(\App\Country::class,10)->create();

        $countries = [
            ['name'=>'USA'],
            ['name'=>'ESPANA'],
            ['name'=>'EL SALVADOR'],
            ['name'=>'CANADA'],
            ['name'=>'REPUBLICA DOMINICANA'],
            ['name'=>'HAITI'],
            ['name'=>'MEXICO'],
            ['name'=>'PUERTO RICO'],
            ['name'=>'DINAMARCA'],
            ['name'=>'HAWAII'],
        ];

        foreach ($countries as $country){
            \App\Country::create($country);
        }
    }
}
