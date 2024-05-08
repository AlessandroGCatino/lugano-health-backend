<?php

namespace Database\Seeders;

use App\Models\Message;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usernames = ["AlessandroConti", "AndreaGreco", "GiuseppeMarini"];

        $dates = [
            "2023-08-23 12:00:00", "2023-11-06 12:00:00", "2023-10-18 12:00:00", "2023-10-26 12:00:00", "2023-12-20 12:00:00",
            "2023-07-29 12:00:00", "2023-05-10 12:00:00", "2023-06-14 12:00:00", "2023-08-02 12:00:00", "2023-09-05 12:00:00",
            "2023-12-27 12:00:00", "2023-08-07 12:00:00", "2023-12-06 12:00:00", "2023-02-14 12:00:00", "2023-08-15 12:00:00",
            "2023-10-13 12:00:00", "2023-04-14 12:00:00", "2023-06-01 12:00:00", "2023-07-14 12:00:00", "2023-08-30 12:00:00"
        ];

        $testi_messaggi = [
            "Grazie dottore per l'attenzione e la cura che mi ha dedicato durante la visita. Ho apprezzato molto la sua professionalità e la capacità di ascolto. Mi sento fiducioso nel percorso di cura che stiamo seguendo insieme.",
            "Buongiorno dottore, volevo aggiornarla sulle mie condizioni dopo il trattamento che mi ha prescritto. Ho notato un miglioramento significativo e mi sento molto meglio rispetto a prima. Vorrei discutere eventuali prossimi passi da seguire per continuare sulla via della guarigione.",
            "Dottore, desidero esprimere la mia gratitudine per il suo impegno e la sua competenza nel gestire la mia situazione medica. Grazie per avermi aiutato a superare questo momento difficile con pazienza e dedizione. Mi sento fortunato ad avere un medico come lei dalla mia parte."
        ];

        

        $emails = [];

        for ($i = 0; $i < 3; $i++) {
            $email = strtolower($usernames[$i] . '@email.com');
            array_push($emails, $email);
        }

        for($i=0; $i<20; $i++){
            for($j=0; $j<3; $j++){
                $newMessage = new Message();
                $newMessage->name = $usernames[$j];
                $newMessage->email = $emails[$j];
                $newMessage->message = $testi_messaggi[$j];
                $newMessage->created_at = $dates[$i];
                $newMessage->updated_at = $dates[$i];

                $newMessage->doctor_id = $i+1;
                $newMessage->save();
            }
        };
    }
}
