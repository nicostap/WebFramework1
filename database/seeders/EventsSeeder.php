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
                'title' => 'Tech Expo 2024',
                'venue' => 'Convention Center A',
                'date' => Carbon::parse('2024-10-15'),
                'start_time' => Carbon::parse('10:00:00'),
                'description' => $faker->text(),
                'booking_url' => $faker->url(),
                'tags' => 'expo,technology,innovation',
                'organizer_id' => 1,
                'event_category_id' => 1,
            ],
            [
                'title' => 'Rock Legends Concert',
                'venue' => 'Stadium B',
                'date' => Carbon::parse('2024-11-10'),
                'start_time' => Carbon::parse('19:00:00'),
                'description' => $faker->text(),
                'booking_url' => $faker->url(),
                'tags' => 'concert,rock,music',
                'organizer_id' => 2,
                'event_category_id' => 2,
            ],
            [
                'title' => 'Business Innovation Conference',
                'venue' => 'Hotel C',
                'date' => Carbon::parse('2024-12-01'),
                'start_time' => Carbon::parse('09:00:00'),
                'description' => $faker->text(),
                'booking_url' => null,
                'tags' => 'conference,business,innovation',
                'organizer_id' => 3,
                'event_category_id' => 3,
            ],
            [
                'title' => 'Art Expo 2024',
                'venue' => 'Gallery D',
                'date' => Carbon::parse('2024-10-25'),
                'start_time' => Carbon::parse('11:00:00'),
                'description' => $faker->text(),
                'booking_url' => $faker->url(),
                'tags' => 'expo,art,creativity',
                'organizer_id' => 4,
                'event_category_id' => 1,
            ],
            [
                'title' => 'Pop Music Concert',
                'venue' => 'Arena E',
                'date' => Carbon::parse('2024-11-20'),
                'start_time' => Carbon::parse('20:00:00'),
                'description' => $faker->text(),
                'booking_url' => $faker->url(),
                'tags' => 'concert,pop,music',
                'organizer_id' => 5,
                'event_category_id' => 2,
            ],
            [
                'title' => 'Tech Business Conference',
                'venue' => 'Hotel F',
                'date' => Carbon::parse('2024-12-15'),
                'start_time' => Carbon::parse('08:30:00'),
                'description' => $faker->text(),
                'booking_url' => null,
                'tags' => 'conference,tech,business',
                'organizer_id' => 1,
                'event_category_id' => 3,
            ],
        ]);
    }
}
