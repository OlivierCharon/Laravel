<?php

use Illuminate\Database\Seeder;

class AnimalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animals')->insert([
            'name' => 'Hello Kitty',
            'desc' => 'A little sweet cat! Soooo lovely!',
            'sex' => 'F',
            'age' => 9,
            'weight' => 4.13,
            'size' => 22,
            'race_id' => 1,
        ]);
    
        DB::table('animals')->insert([
            'name' => 'Thor',
            'desc' => 'A baby cat, but already pretty dangerous!',
            'sex' => 'M',
            'age' => 2,
            'weight' => 1.2,
            'size' => 10,
            'race_id' => 1,
        ]);
    
        DB::table('animals')->insert([
            'name' => 'Panpan',
            'desc' => 'Fluffy little bunny!',
            'sex' => 'M',
            'age' => 7,
            'weight' => 2,
            'size' => 41,
            'race_id' => 2,
        ]);
    
        DB::table('animals')->insert([
            'name' => 'Jack',
            'desc' => 'Vicious and impish.',
            'sex' => 'M',
            'age' => 13,
            'weight' => 4.9,
            'size' => 80,
            'race_id' => 3,
        ]);
    
        DB::table('animals')->insert([
            'name' => 'Kira',
            'desc' => 'Dreadful big cat! Be careful',
            'sex' => 'F',
            'age' => 13,
            'weight' => 95,
            'size' => 2.4,
            'race_id' => 4,
        ]);
    }
}
