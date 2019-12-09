<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(\App\Tag::class,20)->create();

        $tags = [
            ['name'=>'girls'],
            ['name'=>'anime'],
            ['name'=>'games'],
            ['name'=>'sports'],
            ['name'=>'gambling'],
            ['name'=>'travel'],
            ['name'=>'friendship'],
            ['name'=>'sex'],
            ['name'=>'stickers'],
            ['name'=>'fortnite'],
        ];

        foreach ($tags as $tag){
            \App\Tag::create($tag);
        }
    }
}
