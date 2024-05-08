<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vote;
use Illuminate\Support\Facades\DB;

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
        

        $pivotTableData = [
            ['doctor_id' => 1, 'vote_id' => 3],
            ['doctor_id' => 1, 'vote_id' => 5],
            ['doctor_id' => 2, 'vote_id' => 5],
            ['doctor_id' => 3, 'vote_id' => 3],
            ['doctor_id' => 4, 'vote_id' => 3],
            ['doctor_id' => 4, 'vote_id' => 5],
            ['doctor_id' => 5, 'vote_id' => 4],
            ['doctor_id' => 5, 'vote_id' => 3],
            ['doctor_id' => 6, 'vote_id' => 5],
            ['doctor_id' => 6, 'vote_id' => 5],
            ['doctor_id' => 7, 'vote_id' => 3],
            ['doctor_id' => 10, 'vote_id' => 2],
            ['doctor_id' => 11, 'vote_id' => 3],
            ['doctor_id' => 12, 'vote_id' => 2],
            ['doctor_id' => 13, 'vote_id' => 3],
            ['doctor_id' => 14, 'vote_id' => 2],
            ['doctor_id' => 15, 'vote_id' => 3],
            ['doctor_id' => 16, 'vote_id' => 2],
            ['doctor_id' => 17, 'vote_id' => 3],
            ['doctor_id' => 18, 'vote_id' => 2],
            ['doctor_id' => 19, 'vote_id' => 3],
            ['doctor_id' => 20, 'vote_id' => 2],
            ['doctor_id' => 19, 'vote_id' => 5],
            ['doctor_id' => 20, 'vote_id' => 4],
            ['doctor_id' => 1, 'vote_id' => 5],
            ['doctor_id' => 1, 'vote_id' => 5],
            ['doctor_id' => 3, 'vote_id' => 3],
            ['doctor_id' => 4, 'vote_id' => 3],
            ['doctor_id' => 4, 'vote_id' => 5],
            ['doctor_id' => 5, 'vote_id' => 5],
            ['doctor_id' => 5, 'vote_id' => 3],
            ['doctor_id' => 6, 'vote_id' => 5],
            ['doctor_id' => 6, 'vote_id' => 5],
            ['doctor_id' => 6, 'vote_id' => 5],
            ['doctor_id' => 6, 'vote_id' => 5],
            ['doctor_id' => 6, 'vote_id' => 5],
            ['doctor_id' => 7, 'vote_id' => 5],
            ['doctor_id' => 10, 'vote_id' => 3],
            ['doctor_id' => 11, 'vote_id' => 5],
            ['doctor_id' => 12, 'vote_id' => 3],
            ['doctor_id' => 13, 'vote_id' => 3],
            ['doctor_id' => 14, 'vote_id' => 3],
            ['doctor_id' => 15, 'vote_id' => 5],
            ['doctor_id' => 16, 'vote_id' => 5],
            ['doctor_id' => 17, 'vote_id' => 5],
            ['doctor_id' => 18, 'vote_id' => 5],
            ['doctor_id' => 19, 'vote_id' => 5],
            ['doctor_id' => 20, 'vote_id' => 5],
            
        ];

        DB::table('doctor_vote')->insert($pivotTableData);
    }
}
