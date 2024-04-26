<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
    }
}
