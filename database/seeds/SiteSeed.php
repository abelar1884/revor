<?php

use Illuminate\Database\Seeder;

class SiteSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Site::create([
            'name' => 'oreno-erohon',
            'selector' => '.entry-content img'
        ]);
    }
}
