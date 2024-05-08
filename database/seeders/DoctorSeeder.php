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
        $nomi = [
            "Marco", "Luca", "Giovanni", "Antonio", "Francesco",
            "Paolo", "Andrea", "Davide", "Simone", "Fabio",
            "Maria", "Laura", "Giulia", "Sara", "Anna",
            "Francesca", "Alessia", "Valentina", "Giorgia", "Elisa"
        ];

        $cognomi = [
            "Rossi", "Bianchi", "Verdi", "Russo", "Ferrari",
            "Romano", "Gallo", "Costa", "Conti", "Bruno",
            "Rizzo", "Marchetti", "Mancini", "Ferri", "Caruso",
            "Moretti", "Ferrara", "Pellegrini", "Galli", "DeLuca"
        ];

        $descrizioniPerformance = [
            "Eccellente capacità di comunicazione con i pazienti e il personale medico.",
            "Competente nell'interpretare e analizzare i risultati degli esami medici.",
            "Approccio empatico e attento alle esigenze dei pazienti durante le visite.",
            "Professionale nel gestire situazioni critiche e di emergenza in modo tempestivo.",
            "Partecipa attivamente a programmi di formazione continua per rimanere aggiornato sulle nuove pratiche mediche.",
            "Capacità di lavorare efficacemente in team multidisciplinari per garantire la migliore assistenza ai pazienti.",
            "Eccellente abilità nel diagnosticare e trattare una vasta gamma di condizioni mediche.",
            "Costruisce rapporti di fiducia con i pazienti, creando un ambiente confortevole durante le visite.",
            "Gestisce con successo un ampio carico di pazienti, garantendo un'assistenza di alta qualità a ciascuno.",
            "Contribuisce attivamente a progetti di ricerca medica per migliorare le cure e le terapie disponibili.",
            "Eccellente capacità di comunicazione con i pazienti e il personale medico.",
            "Competente nell'interpretare e analizzare i risultati degli esami medici.",
            "Approccio empatico e attento alle esigenze dei pazienti durante le visite.",
            "Professionale nel gestire situazioni critiche e di emergenza in modo tempestivo.",
            "Partecipa attivamente a programmi di formazione continua per rimanere aggiornato sulle nuove pratiche mediche.",
            "Capacità di lavorare efficacemente in team multidisciplinari per garantire la migliore assistenza ai pazienti.",
            "Eccellente abilità nel diagnosticare e trattare una vasta gamma di condizioni mediche.",
            "Costruisce rapporti di fiducia con i pazienti, creando un ambiente confortevole durante le visite.",
            "Gestisce con successo un ampio carico di pazienti, garantendo un'assistenza di alta qualità a ciascuno.",
            "Contribuisce attivamente a progetti di ricerca medica per migliorare le cure e le terapie disponibili.",
        ];

        $slugs = [
            "marco-rossi", "luca-bianchi", "giovanni-verdi", "antonio-russo", "francesco-ferrari",
            "paolo-romano", "andrea-gallo", "davide-costa", "simone-conti", "fabio-bruno",
            "maria-rizzo", "laura-marchetti", "giulia-mancini", "sara-ferri", "anna-caruso",
            "francesca-moretti", "alessia-ferrara", "valentina-pellegrini", "giorgia-galli", "elisa-deluca"
        ];

        $indirizzi = ["Via Roma, 1", "Corso Italia, 12", "Via Torino, 5", "Piazza Garibaldi, 8", "Via Venezia, 15", "Corso Vittorio, Emanuele", "Via Firenze, 22", "Via Milano, 7", "Via Napoli, 10", "Piazza Dante, 3", "Via Genova, 20", "Corso Garibaldi, 14", "Via Palermo, 18", "Piazza Duomo, 25", "Via Roma, 30", "Corso Garibaldi, 7", "Via Milano, 9", "Via Firenze, 12", "Corso Italia, 5", "Piazza Garibaldi, 1"];
        $numeri_telefono = ["123-456-7890", "234-567-8901", "345-678-9012", "456-789-0123", "567-890-1234", "678-901-2345", "789-012-3456", "890-123-4567", "901-234-5678", "012-345-6789", "123-456-7890", "234-567-8901", "345-678-9012", "456-789-0123", "567-890-1234", "678-901-2345", "789-012-3456", "890-123-4567", "901-234-5678", "012-345-6789"];

        $counter = "1";

        for($i=0; $i<10; $i++){
            $newDoctor = new Doctor();
            $newDoctor->name = $nomi[$i];
            $newDoctor->surname = $cognomi[$i];
            $newDoctor->performances = $descrizioniPerformance[$i];
            $newDoctor->address = $indirizzi[$i];
            $newDoctor->ProfilePic = "profile_images/M".$counter.".jpg";

            $numero = intval($counter);
            $numeroIncrementato = $numero + 1;
            $counter = strval($numeroIncrementato);

            $newDoctor->phone_number = $numeri_telefono[$i];
            $newDoctor->slug = $slugs[$i];
            $newDoctor->user_id = $i+1;
            $newDoctor->save();
        };

        $counter = "1";
        for($i=10; $i<20; $i++){
            $newDoctor = new Doctor();
            $newDoctor->name = $nomi[$i];
            $newDoctor->surname = $cognomi[$i];
            $newDoctor->performances = $descrizioniPerformance[$i];
            $newDoctor->address = $indirizzi[$i];
            $newDoctor->ProfilePic = "profile_images/F".$counter.".jpg";

            $numero = intval($counter);
            $numeroIncrementato = $numero + 1;
            $counter = strval($numeroIncrementato);

            $newDoctor->phone_number = $numeri_telefono[$i];
            $newDoctor->slug = $slugs[$i];
            $newDoctor->user_id = $i+1;
            $newDoctor->save();
        };
    }
}
