<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            OrganizersSeeder::class,
            EventCategoriesSeeder::class,
            EventsSeeder::class,
            UsersSeeder::class,
        ]);
    }
}
