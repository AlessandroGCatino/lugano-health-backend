<?php

namespace Database\Seeders;

use App\Models\Sponsorization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prices = [2.99, 5.99, 9.99];
        $names = ["Basic", "Premium", "Platinum"];
        $timespan = [24,72,144];
        $descriptions = ["Sponsorizzazione di base per aumentare la visibilità del tuo profilo medico.", " Sponsorizzazione avanzata per massimizzare la visibilità del tuo profilo medico e ottenere maggiori vantaggi.", "Sponsorizzazione di livello superiore per una visibilità eccezionale e vantaggi esclusivi per il tuo profilo medico."];

        for($i=0; $i<3; $i++){
            $newSponsorization = new Sponsorization();
            $newSponsorization->price = $prices[$i];
            $newSponsorization->name = $names[$i];
            $newSponsorization->description = $descriptions[$i];
            $newSponsorization->durata = $timespan[$i];
            $newSponsorization->save();
        };
    }
}
