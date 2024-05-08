<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SpecializationSeeder extends Seeder
{
    public function run(): void
    {
                
        $specializations = [
            'Cardiologia',
            'Dermatologia',
            'Ginecologia',
            'Neurologia',
            'Oncologia',
            'Ortopedia',
            'Pediatria',
            'Psichiatria',
            'Endocrinologia',
            'Oculistica',
            'Chirurgia generale',
            'Otorinolaringoiatria',
        ];
        
        foreach($specializations as $element){
            $newSpecialization = new Specialization();
            $newSpecialization->name = $element;
            $newSpecialization->slug = Str::slug($newSpecialization->name, '-');
            $newSpecialization->save();
        }

        $pivotTableData = [
            ['doctor_id' => 1, 'specialization_id' => 1],
            ['doctor_id' => 1, 'specialization_id' => 2],
            ['doctor_id' => 2, 'specialization_id' => 2],
            ['doctor_id' => 3, 'specialization_id' => 3],
            ['doctor_id' => 4, 'specialization_id' => 1],
            ['doctor_id' => 4, 'specialization_id' => 2],
            ['doctor_id' => 5, 'specialization_id' => 4],
            ['doctor_id' => 5, 'specialization_id' => 1],
            ['doctor_id' => 6, 'specialization_id' => 1],
            ['doctor_id' => 6, 'specialization_id' => 2],
            ['doctor_id' => 6, 'specialization_id' => 5],
            ['doctor_id' => 6, 'specialization_id' => 6],
            ['doctor_id' => 7, 'specialization_id' => 1],
            ['doctor_id' => 8, 'specialization_id' => 7],
            ['doctor_id' => 9, 'specialization_id' => 10],
            ['doctor_id' => 1, 'specialization_id' => 12],
            ['doctor_id' => 1, 'specialization_id' => 11],
            ['doctor_id' => 10, 'specialization_id' => 2],
            ['doctor_id' => 11, 'specialization_id' => 1],
            ['doctor_id' => 12, 'specialization_id' => 2],
            ['doctor_id' => 13, 'specialization_id' => 1],
            ['doctor_id' => 14, 'specialization_id' => 2],
            ['doctor_id' => 15, 'specialization_id' => 1],
            ['doctor_id' => 16, 'specialization_id' => 2],
            ['doctor_id' => 17, 'specialization_id' => 1],
            ['doctor_id' => 18, 'specialization_id' => 2],
            ['doctor_id' => 19, 'specialization_id' => 1],
            ['doctor_id' => 20, 'specialization_id' => 2],
            ['doctor_id' => 17, 'specialization_id' => 8],
            ['doctor_id' => 18, 'specialization_id' => 9],
            ['doctor_id' => 19, 'specialization_id' => 5],
            ['doctor_id' => 20, 'specialization_id' => 4],
            
        ];

        DB::table('doctor_specialization')->insert($pivotTableData);
    }
}
