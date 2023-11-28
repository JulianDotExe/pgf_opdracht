<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $event1 = Event::create([
            'event_date' => '2023-12-03',
            'event_name' => 'Model Train Expo',
            'categories_id' => '1',
            'beschrijving' => 'Explore a fascinating exhibition showcasing intricate model train setups and layouts.',
            'locatie' => 'Rotterdam',
            'link' => 'https://example.com/model-train-expo',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $event2 = Event::create([
            'event_date' => '2023-12-29',
            'event_name' => 'Train Swap Meet',
            'categories_id' => '2',
            'beschrijving' => 'Join fellow enthusiasts for a day of swapping and selling model train items in Utrecht.',
            'locatie' => 'Utrecht',
            'link' => 'https://example.com/train-swap-meet',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $event3 = Event::create([
            'event_date' => '2024-02-20',
            'event_name' => 'Model Train Workshop in Houten',
            'categories_id' => '3',
            'beschrijving' => 'Participate in a hands-on workshop to learn new techniques for building and operating model trains in Houten.',
            'locatie' => 'Houten',
            'link' => 'https://example.com/model-train-workshop',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $event4 = Event::create([
            'event_date' => '2024-04-13',
            'event_name' => 'Model Train Exhibition in Aalsmeer',
            'categories_id' => '1',
            'beschrijving' => 'Experience the charm of model trains in Aalsmeer. This exhibition is a must-visit for enthusiasts!',
            'locatie' => 'Aalsmeer',
            'link' => 'https://example.com/model-train-exhibition-aalsmeer',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $event5 = Event::create([
            'event_date' => '2024-05-27',
            'event_name' => 'Model Train Competition in Kampen',
            'categories_id' => '6',
            'beschrijving' => 'Witness exciting model train competitions and see who takes home the top honors in Kampen.',
            'locatie' => 'Kampen',
            'link' => 'https://example.com/model-train-competition-kampen',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $event6 = Event::create([
            'event_date' => '2024-08-06',
            'event_name' => 'Historical Model Train Day in Lelystad',
            'categories_id' => '8',
            'beschrijving' => 'Step back in time with this historical-themed model train day in Lelystad. A journey through the evolution of railroads!',
            'locatie' => 'Lelystad',
            'link' => 'https://example.com/historical-model-train-day-lelystad',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
