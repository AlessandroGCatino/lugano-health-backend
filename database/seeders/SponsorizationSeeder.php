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

        for($i=0; $i<3; $i++){
            $newSponsorization = new Sponsorization();
            $newSponsorization->price = $prices[$i];
            $newSponsorization->name = $names[$i];
            $newSponsorization->durata = $timespan[$i];
            $newSponsorization->save();
        };
    }
}
