<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;
use App\Models\Categorie;
use App\Models\Color1;
use App\Models\Color2;
use App\Models\Epoche;
use App\Models\Owner;
use App\Models\Sort;
use App\Models\Overview;

class OverviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Marklin
        $overviews1 = Overview::create([
            'user_id' => 1,
            'sort_id' => 4,
            'brand_id' => 2,
            'catalogusnr' => '1',
            'epoche_id' => 6,
            'nummer' => '1',
            'eigenschappen' => 'Voorbereid voor binnenverlichting - Verstelbare buffers - Afmeting kar 26,4 cm. - Afmeting totale trein 45,6 cm.',
            'owner_id' => 4,
            'color1_id' => 6,
            'color2_id' => 1,
            'bijzonderheden' => 'InterCity bistrotrolley in wit en rood kleurdesign. Voorbereid voor actieve rijtuigaansluiting met insteekbare kortkoppelingsdissel 7319 of scheidbare kortkoppelingen 72020/72021.',
            'foto' => 'uploads/overviews/1701095021.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);  
        // Trix
        $overviews2 = Overview::create([
            'user_id' => 1,
            'sort_id' => 3,
            'brand_id' => 2,
            'catalogusnr' => '2',
            'epoche_id' => 6,
            'nummer' => '2',
            'eigenschappen' => 'N.V.T.',
            'owner_id' => 8,
            'color1_id' => 1,
            'color2_id' => 6,
            'bijzonderheden' => 'N.V.T.',
            'foto' => 'uploads/overviews/1701095067.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]); 
        // Fleischmann
        $overviews3 = Overview::create([
            'user_id' => 2,
            'sort_id' => 3,
            'brand_id' => 3,
            'catalogusnr' => '1',
            'epoche_id' => 6,
            'nummer' => '1',
            'eigenschappen' => 'N.V.T.',
            'owner_id' => 4,
            'color1_id' => 1,
            'color2_id' => 3,
            'bijzonderheden' => 'N.V.T.',
            'foto' => 'uploads/overviews/1701094946.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]); 
        // Marklin
        $overviews4 = Overview::create([
            'user_id' => 2,
            'sort_id' => 3,
            'brand_id' => 1,
            'catalogusnr' => '2',
            'epoche_id' => 5,
            'nummer' => '2',
            'eigenschappen' => 'N.V.T.',
            'owner_id' => 1,
            'color1_id' => 4,
            'color2_id' => 5,
            'bijzonderheden' => 'N.V.T.',
            'foto' => 'uploads/overviews/1701095045.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]); 
    }
}
