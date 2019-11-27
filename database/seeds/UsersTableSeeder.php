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
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'bookit-admin@yopmail.com',
            'password' => bcrypt('admin'),
        ]);
    
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@yopmail.com',
            'password' => bcrypt('user'),
        ]);
    
        DB::table('users')->insert([
            'name' => 'Alygator',
            'email' => 'oli.charon@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}