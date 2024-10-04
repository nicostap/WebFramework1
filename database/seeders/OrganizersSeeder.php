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
            ['name' => 'Alpha Events', 'description' => $faker->text(), 'facebook_link' => $faker->url(), 'x_link' => $faker->url(), 'website_link' => $faker->url()],
            ['name' => 'Beta Organizers', 'description' => $faker->text(), 'facebook_link' => $faker->url(), 'x_link' => $faker->url(), 'website_link' => $faker->url()],
            ['name' => 'Gamma Productions', 'description' => $faker->text(), 'facebook_link' => $faker->url(), 'x_link' => $faker->url(), 'website_link' => $faker->url()],
            ['name' => 'Delta Organizers', 'description' => $faker->text(), 'facebook_link' => $faker->url(), 'x_link' => $faker->url(), 'website_link' => $faker->url()],
            ['name' => 'Omega Events', 'description' => $faker->text(), 'facebook_link' => $faker->url(), 'x_link' => $faker->url(), 'website_link' => $faker->url()],
        ]);
    }
}