<?php

use Illuminate\Database\Seeder;

class MangaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<40; $i++)
        {
            $manga = \App\Models\Manga::create([
                'title' =>  str_random(10),
                'count_page' => rand(10, 20)
            ]);

           for ($a=0; $a<4; $a++)
           {
               \App\Models\Taggable::create([
                   'tag_id' => rand(1, 6),
                   'taggable_id' => $manga->id,
                   'taggable_type' => \App\Models\Manga::class
               ]);
           }
        }
    }
}
