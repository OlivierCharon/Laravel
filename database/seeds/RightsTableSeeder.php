<?php
    
    use Illuminate\Database\Seeder;
    
    class RightsTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            DB::table('rights')->insert([
                'name' => 'Admin'
            ]);
    
            DB::table('rights')->insert([
                'name' => 'Moderator'
            ]);
    
            DB::table('rights')->insert([
                'name' => 'User'
            ]);
        }
    }
