<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'title' => 'Event 1',
            'description' => 'Description for event 1',
            'image_url' => 'https://via.placeholder.com/150',
            // 'password' => Hash::make('password'),
        ]);
        
        DB::table('events')->insert([
            'title' => 'Event 2',
            'description' => 'Description for event 2',
            'image_url' => 'https://via.placeholder.com/150',
            // 'password' => Hash::make('password'),
        ]);
        
        DB::table('events')->insert([
            'title' => 'Event 3',
            'description' => 'Description for event 3',
            'image_url' => 'https://via.placeholder.com/150',
            // 'password' => Hash::make('password'),
        ]);
        
        DB::table('events')->insert([
            'title' => 'Event 4',
            'description' => 'Description for event 4',
            'image_url' => 'https://via.placeholder.com/150',
            // 'password' => Hash::make('password'),
        ]);
    }
}
