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
        $starRatings = [
            ['stars' => 1, 'description' => 'Pessimo'],
            ['stars' => 2, 'description' => 'Scarso'],
            ['stars' => 3, 'description' => 'Mediocre'],
            ['stars' => 4, 'description' => 'Buono'],
            ['stars' => 5, 'description' => 'Eccellente'],
        ];

        foreach ($starRatings as $element) {
            Vote::create($element);
        }
        
    }
}
