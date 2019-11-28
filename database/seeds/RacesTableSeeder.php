<?php

use Illuminate\Database\Seeder;

class RacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('races')->insert([
            'name' => 'Cat',
            'class' => 'feline',
            'life_duration' => 15
        ]);
    
        DB::table('races')->insert([
            'name' => 'Rabbit',
            'class' => 'Leporidae',
            'life_duration' => 9
        ]);
    
        DB::table('races')->insert([
            'name' => 'Eagle',
            'class' => 'Accipitridae',
            'life_duration' => 20
        ]);
    
        DB::table('races')->insert([
            'name' => 'Tiger',
            'class' => 'feline',
            'life_duration' => 15
        ]);
    }
}
