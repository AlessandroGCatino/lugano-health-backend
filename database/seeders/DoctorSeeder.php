<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        $nomi = ["Marco", "Laura", "Luca", "Sofia", "Matteo", "Giulia", "Alessio", "Chiara", "Marco", "Martina", "Giovanni", "Elena", "Francesco", "Sara", "Luca", "Anna", "Michele", "Eleonora", "Alessandro", "Valentina"];
        $cognomi = ["Rossi", "Bianchi", "Verdi", "Moretti", "Russo", "Conti", "Ferrari", "Romano", "Esposito", "Mancini", "Marini", "Rizzo", "Barbieri", "Greco", "Russo", "Costa", "Sanna", "Ferri", "Vitale", "Pellegrini"];
        $indirizzi = ["Via Roma 1", "Corso Italia 12", "Via Torino 5", "Piazza Garibaldi 8", "Via Venezia 15", "Corso Vittorio Emanuele", "Via Firenze 22", "Via Milano 7", "Via Napoli 10", "Piazza Dante 3", "Via Genova 20", "Corso Garibaldi 14", "Via Palermo 18", "Piazza Duomo 25", "Via Roma 30", "Corso Garibaldi 7", "Via Milano 9", "Via Firenze 12", "Corso Italia 5", "Piazza Garibaldi 1"];
        $numeri_telefono = ["123-456-7890", "234-567-8901", "345-678-9012", "456-789-0123", "567-890-1234", "678-901-2345", "789-012-3456", "890-123-4567", "901-234-5678", "012-345-6789", "123-456-7890", "234-567-8901", "345-678-9012", "456-789-0123", "567-890-1234", "678-901-2345", "789-012-3456", "890-123-4567", "901-234-5678", "012-345-6789"];

        for($i=0; $i<20; $i++){
            $newDoctor = new Doctor();
            $newDoctor->name = $nomi[$i];
            $newDoctor->surname = $cognomi[$i];
            $newDoctor->address = $indirizzi[$i];
            $newDoctor->phone_number = $numeri_telefono[$i];
            $newDoctor->save();
        };
    }
}
