<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vote;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $starRatings = ['Pessimo','Scarso','Mediocre','Buono','Eccellente'];

        for ($i=0; $i < 5 ; $i++) { 
            $newVote = new Vote();
            $newVote->stars = $i+1;
            $newVote->description = $starRatings[$i];

            $newVote->save();
        }
        
    }
}
