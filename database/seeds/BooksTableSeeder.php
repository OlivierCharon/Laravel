<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'name' => 'Livre 1',
            'author' => 'Dieu',
            'genre_id' => 1,
        ]);
    
        DB::table('books')->insert([
            'name' => 'Livre 2',
            'author' => 'Satan',
            'genre_id' => 3,
        ]);
    
        DB::table('books')->insert([
            'name' => 'Livre 3',
            'author' => 'Lilith',
            'genre_id' => 2,
        ]);
    
        DB::table('books')->insert([
            'name' => 'Livre 4',
            'author' => 'Lilith',
            'genre_id' => 1,
        ]);
    
        DB::table('books')->insert([
            'name' => 'Livre 5',
            'author' => 'Mousse',
            'genre_id' => 3,
        ]);
    }
}
