<?php

namespace Database\Seeders;

use App\Models\Sponsorization;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        $startGenerico = new DateTime();
        $deadlineGenerica = clone $startGenerico; // Clona l'oggetto per evitare di modificare $oggi direttamente
        $deadlineGenerica->modify('+3 day'); // Aggiungi un giorno
        

        $pivotTableData = [
            ['id'=>1, 'doctor_id' => 10, 'sponsorization_id' => 1, "start" => $startGenerico, "deadline" => $deadlineGenerica],
            ['id'=>2, 'doctor_id' => 12, 'sponsorization_id' => 2, "start" => $startGenerico, "deadline" => $deadlineGenerica],
            ['id'=>3, 'doctor_id' => 2, 'sponsorization_id' => 3, "start" => $startGenerico, "deadline" => $deadlineGenerica],
            ['id'=>4, 'doctor_id' => 4, 'sponsorization_id' => 1, "start" => $startGenerico, "deadline" => $deadlineGenerica],
            ['id'=>5, 'doctor_id' => 5, 'sponsorization_id' => 3, "start" => $startGenerico, "deadline" => $deadlineGenerica],
            ['id'=>6, 'doctor_id' => 6, 'sponsorization_id' => 1, "start" => $startGenerico, "deadline" => $deadlineGenerica],
            ['id'=>7, 'doctor_id' => 8, 'sponsorization_id' => 2, "start" => $startGenerico, "deadline" => $deadlineGenerica],
            ['id'=>8, 'doctor_id' => 1, 'sponsorization_id' => 2, "start" => $startGenerico, "deadline" => $deadlineGenerica],
            
        ];

        DB::table('doctor_sponsorization')->insert($pivotTableData);
    }
}
