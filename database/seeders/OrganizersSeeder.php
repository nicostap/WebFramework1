<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OrganizersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('organizers')->insert([
            ['name' => 'Southern Sydney University', 'description' => $faker->text(500), 'facebook_link' => $faker->url(), 'x_link' => $faker->url(), 'website_link' => $faker->url()],
            ['name' => 'MSW Global', 'description' => $faker->text(500), 'facebook_link' => $faker->url(), 'x_link' => $faker->url(), 'website_link' => $faker->url()],
            ['name' => 'HWG', 'description' => $faker->text(500), 'facebook_link' => $faker->url(), 'x_link' => $faker->url(), 'website_link' => $faker->url()],
            ['name' => 'OBKG', 'description' => $faker->text(500), 'facebook_link' => $faker->url(), 'x_link' => $faker->url(), 'website_link' => $faker->url()],
            ['name' => 'PT OSI', 'description' => $faker->text(500), 'facebook_link' => $faker->url(), 'x_link' => $faker->url(), 'website_link' => $faker->url()],
        ]);
    }
}