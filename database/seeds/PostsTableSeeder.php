<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('posts')->insert([
        	'user_id' => 1,
        	'artist_id' => 1,
            'title' => 'Classic Hiphop',
            'image' => 'http://localhost:8000/images/hiphop2.jpg',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, illum.',
            'created_at' => Carbon::now(),
        ]);

        DB::table('posts')->insert([
    		'user_id' => 1,
    		'artist_id' => 1,
            'title' => 'Feel the Music!',
            'image' => 'http://localhost:8000/images/hiphop3.png',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, illum.',
            'created_at' => Carbon::now(),
        ]);
        // Aantal posts gemaakt met wat dummy data
        DB::table('posts')->insert([
        	'user_id' => 1,
    		'artist_id' => 1,
            'title' => 'Rap competition',
            'image' => 'http://localhost:8000/images/hiphop.jpg',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, illum.',
            'created_at' => Carbon::now(),
        ]);

        // De eerste post heeft test comments.  
        DB::table('comments')->insert([
            'text' => 'wow deze post is echt cool!',
            'post_id' => 1,
            'user_id' => 1,
            'created_at' => Carbon::now(),
        ]);

        DB::table('comments')->insert([
            'text' => 'woowwww kappa pride :P',
            'post_id' => 1,
            'user_id' => 1,
            'created_at' => Carbon::now(),
        ]);
    }
}
