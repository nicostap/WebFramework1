<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('events')->insert([
            [
                'title' => 'Indonesia Innovation Challenge 2024 Powered by Launch Pad',
                'venue' => 'Jatim Expo',
                'date' => '2024-10-23',
                'start_time' => '09:00:00',
                'description' => $faker->text(500),
                'booking_url' => null,
                'tags' => 'Surabaya Science & Tech Events,Innovation Challenge',
                'organizer_id' => 1,
                'event_category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'active' => 1,
            ],
            [
                'title' => 'Kids Education Expo 2024',
                'venue' => 'The Westin',
                'date' => '2024-10-21',
                'start_time' => '09:00:00',
                'description' => $faker->text(500),
                'booking_url' => null,
                'tags' => 'Kids Expo,Education Expo',
                'organizer_id' => 1,
                'event_category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'active' => 1,
            ],
            [
                'title' => 'Surabaya Great Expo 2024',
                'venue' => 'Grand City Surabaya',
                'date' => '2024-10-16',
                'start_time' => '08:00:00',
                'description' => $faker->text(500),
                'booking_url' => null,
                'tags' => 'Surabaya Expo',
                'organizer_id' => 1,
                'event_category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'active' => 1,
            ],
            [
                'title' => 'SMEX (Surabaya Music, Multimedia, and Lighting Expo) 2024',
                'venue' => 'Grand City Surabaya',
                'date' => '2024-09-29',
                'start_time' => '08:00:00',
                'description' => $faker->text(500),
                'booking_url' => null,
                'tags' => 'Surabaya Music,Multimedia',
                'organizer_id' => 1,
                'event_category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'active' => 1,
            ],
            [
                'title' => 'Japan Edu Expo 2024',
                'venue' => 'Hotel Said',
                'date' => '2024-09-22',
                'start_time' => '08:00:00',
                'description' => $faker->text(500),
                'booking_url' => null,
                'tags' => 'Education Expo,Japan',
                'organizer_id' => 1,
                'event_category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'active' => 1,
            ],
            [
                'title' => 'Surabaya Hospital Expo 2024',
                'venue' => 'Grand City Surabaya',
                'date' => '2024-10-11',
                'start_time' => '08:00:00',
                'description' => $faker->text(500),
                'booking_url' => null,
                'tags' => 'hospital, health, expo',
                'organizer_id' => 1,
                'event_category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'active' => 1,
            ],
        ]);
    }
}
