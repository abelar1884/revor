<?php

use Illuminate\Database\Seeder;

class TagSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'big brests',
            'succubus',
            'shotacon',
            'milf',
            'trap',
            'muscle'
        ];

        foreach ($tags as $tag)
        {
            \App\Models\Tag::create([
               'title' => $tag
            ]);
        }
    }
}
