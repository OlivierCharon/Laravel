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
            'right_id' => 1,
        ]);
    
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@yopmail.com',
            'password' => bcrypt('user'),
            'right_id' => 3,
        ]);
    
        DB::table('users')->insert([
            'name' => 'Alygator',
            'email' => 'oli.charon@gmail.com',
            'password' => bcrypt('password'),
            'right_id' => 2,
        ]);
    }
}