<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $types = [
            ['name'=>'WHATSAPP'],
            ['name'=>'TELEGRAM'],
            ['name'=>'DISCORD'],
            ['name'=>'FACEBOOK'],
        ];

        foreach ($types as $type){
            \App\Type::create($type);
        }
    }
}
