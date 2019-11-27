<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            'name' => 'Polar',
            'description' => 'Police books'
        ]);
        
        DB::table('genres')->insert([
            'name' => 'BD',
            'description' => 'Childhood books'
        ]);
        
        DB::table('genres')->insert([
            'name' => 'Heroic Fantasy',
            'description' => 'Heroes books'
        ]);
    }
}
