<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news1 = News::create([
            'titel' => 'Spectacular Model Train Exhibition Coming Soon',
            'categories_id' => 1, // Tentoonstellingen en Shows
            'inhoud' => 'Get ready for an extraordinary model train exhibition featuring stunning displays and interactive shows for enthusiasts.',
            'auteur' => 'Jane Smith',
            'link' => 'https://example.com/model-train-exhibition',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $news2 = News::create([
            'titel' => 'Explore Unique Finds at the Grand Train Swap Meet',
            'categories_id' => 2, // Ruilevenementen en Verkoopbeurzen
            'inhoud' => 'Discover hidden treasures and rare model train items at the upcoming grand swap meet for enthusiasts and collectors.',
            'auteur' => 'Bob Johnson',
            'link' => 'https://example.com/train-swap-meet',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $news3 = News::create([
            'titel' => 'Hands-On Learning at the Model Train Workshop',
            'categories_id' => 3, // Workshops en Demonstraties
            'inhoud' => 'Participate in an enriching model train workshop offering hands-on learning experiences and demonstrations for all skill levels.',
            'auteur' => 'Emily Williams',
            'link' => 'https://example.com/model-train-workshop',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $news4 = News::create([
            'titel' => 'Club Gathering: A Fun Day for Model Train Enthusiasts',
            'categories_id' => 4, // Clubbijeenkomsten
            'inhoud' => 'Join fellow club members for a day of camaraderie, discussions, and model train fun at the upcoming club gathering.',
            'auteur' => 'Michael Davis',
            'link' => 'https://example.com/model-train-club-gathering',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $news5 = News::create([
            'titel' => 'Themed Model Train Events on the Horizon',
            'categories_id' => 5, // Thema- of Schaalgerichte Evenementen
            'inhoud' => 'Stay tuned for themed model train events that cater to specific interests and scales, providing a unique experience for attendees.',
            'auteur' => 'Sophie Turner',
            'link' => 'https://example.com/themed-model-train-events',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $news6 = News::create([
            'titel' => 'Model Train Competition: Who Will Be the Champion?',
            'categories_id' => 6, // Wedstrijden en Competities
            'inhoud' => 'Witness intense model train competitions as enthusiasts compete for the title of the ultimate model train champion.',
            'auteur' => 'Chris Anderson',
            'link' => 'https://example.com/model-train-competition',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
