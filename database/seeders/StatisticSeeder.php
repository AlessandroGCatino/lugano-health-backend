<?php

namespace Database\Seeders;

use App\Models\Statistic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numeroPazienti = range(1, 1000);

        for ($i = 0; $i < 10; $i++) {
            $newStatistic = new Statistic();
            $newStatistic->numeroPazienti = $numeroPazienti[rand(0, count($numeroPazienti) - 1)];
            $newStatistic->save();
        }
    }
}
