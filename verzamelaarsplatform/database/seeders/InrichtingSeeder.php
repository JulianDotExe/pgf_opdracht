<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Categorie;
use App\Models\Color1;
use App\Models\Color2;
use App\Models\Epoche;
use App\Models\Owner;
use App\Models\Sort;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InrichtingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $basicColors = [
            'rood',
            'blauw',
            'groen',
            'geel',
            'zwart',
            'wit',
            'paars',
            'oranje',
            'bruin',
            'roze',
            'grijs',
            'turquoise',
            'indigo',
            'kastanjebruin',
            'limoen'
            // ... voeg meer kleuren toe zoals gewenst
        ];

        foreach ($basicColors as $color) {
            Color1::create([
                'color1' => $color
            ]);
            Color2::create([
                'color2' => $color
            ]);
        }

        $epochs = [
            'Epoch I',
            'Epoch II',
            'Epoch III',
            'Epoch IV',
            'Epoch V',
            'Epoch VI'
            // ... voeg meer epoches toe indien nodig
        ];

        foreach ($epochs as $epochName) {
            Epoche::create([
                'epoche_name' => $epochName,
            ]);
        }

        $categories = [
            'Tentoonstellingen en Shows',
            'Ruilevenementen en Verkoopbeurzen',
            'Workshops en Demonstraties',
            'Clubbijeenkomsten',
            'Thema- of Schaalgerichte Evenementen',
            'Wedstrijden en Competities',
            'Toon- en Doe-dagen',
            'Historische Themadagen'
            // ... voeg meer categorieën toe indien nodig
        ];

        foreach ($categories as $categoryName) {
            Categorie::create([
                'category_name' => $categoryName,
            ]);
        }

        $companies = [
            'NS (Nederlandse Spoorwegen)',
            'RENFE (Red Nacional de los Ferrocarriles Españoles)',
            'SNCF (Société Nationale des Chemins de fer Français)',
            'DB (Deutsche Bahn)',
            'CP (Comboios de Portugal)',
            'SBB (Schweizerische Bundesbahnen)',
            'Trenitalia',
            'ÖBB (Österreichische Bundesbahnen)',
            'Amtrak',
            'British Rail (BR)'
            // ... voeg meer spoorwegmaatschappijen toe indien nodig
        ];

        foreach ($companies as $companyName) {
            Owner::create([
                'owner_name' => $companyName,
            ]);
        }

        $vehicles = [
            'Stoomlocomotief',
            'Diesellocomotief',
            'Elektrische locomotief',
            'Personenrijtuig',
            'Goederenwagon',
            'Postrijtuig',
            'Motorpost',
            'Trams',
            'Treinstellen',
            'Werkvoertuigen',
            'Historische Voertuigen'
            // ... voeg meer typen voertuigen toe indien nodig
        ];

        foreach ($vehicles as $vehicleType) {
            Sort::create([
                'sort_name' => $vehicleType,
            ]);
        }

        $brands = [
            'Arnold',
            'Minitrix',
            'Fleischmann',
            'Roco',
            'Piko',
            'Lima',
            'Hornby',
            'Bachmann',
            'Electrotren',
            'Heki'
            // ... voeg meer merken toe indien nodig
        ];

        foreach ($brands as $brandName) {
            Brand::create([
                'brand_name' => $brandName,
            ]);
        }
    }
}
