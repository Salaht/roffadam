<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Aantal artists toegevoegd met wat dummy text 
          DB::table('artists')->insert([
            'name' => 'Boef',
            'image' => 'http://localhost:8000/images/boef.jpg',
            'biography' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, illum.',
            'created_at' => Carbon::now(),
        ]);

        DB::table('artists')->insert([
            'name' => 'Lil Kleine',
            'image' => 'http://localhost:8000/images/lilkleine.jpg',
            'biography' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, illum.',
            'created_at' => Carbon::now(),
        ]);

        DB::table('artists')->insert([
            'name' => 'Hef',
            'image' => 'http://localhost:8000/images/Hef.jpeg',
            'biography' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, illum.',
            'created_at' => Carbon::now(),
        ]);
    }
}
