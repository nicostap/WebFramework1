<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('event_categories')->insert([
            ['name' => 'Expo'],
            ['name' => 'Concert'],
            ['name' => 'Conference'],
        ]);
    }
}