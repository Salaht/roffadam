<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // De rollen toevoegen aan de roles table Admin/user
    	DB::table('roles')->insert([
    		'id' => 1,
            'name' => 'admin',
        ]);

        DB::table('roles')->insert([
    		'id' => 2,
            'name' => 'user',
        ]);

        // De Gebruiker aangemaakt met als rol admin 
        DB::table('users')->insert([
    		'role_id' => 1,
            'name' => 'Salah',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin12')
        ]);

    }
}
