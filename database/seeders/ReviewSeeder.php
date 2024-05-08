<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usernames = ["AlessandroConti", "AndreaGreco", "GiuseppeMarini", "GiovanniFerrari", "AlbertoCosta", "DavideRusso", "FabioVitale", "FrancescoPellegrini", "MarioBarbieri", "AntonioVerdi", "LucaMancini", "PaoloBianchi", "MarcoRossi", "LorenzoRomano", "SimoneMoretti", "StefanoSanna", "FedericoGalli", "RobertoRizzo", "RiccardoEsposito", "MarioGreco"];

        $dates = [ "2023-08-23", "2023-11-06", "2023-10-18", "2023-10-26", "2023-12-20", "2023-07-29", "2023-05-10", "2023-06-14", "2023-08-02", "2023-09-05", "2023-12-27", "2023-08-07", "2023-12-06", "2023-02-14", "2023-08-15", "2023-10-13", "2023-04-14", "2023-06-01", "2023-07-14", "2023-08-30"];

        $emails = [];
        for ($i = 0; $i < 20; $i++) {
            $email = strtolower($usernames[$i] . '@email.com');
            $emails[] = $email;
        }

        $recensioni_dottori = [
            "Professionista eccezionale, attento e competente, mi ha aiutato molto nel gestire il mio problema di salute.",
            "Sono rimasto molto soddisfatto della visita, ha spiegato tutto in modo chiaro e mi ha dato ottimi consigli sulla cura della mia condizione.",
            "Molto gentile e empatico, ha ascoltato le mie preoccupazioni e mi ha fornito un trattamento efficace.",
            "Consiglio vivamente, professionale e disponibile, ha risolto il mio problema in modo rapido e efficace.",
            "Medico molto preparato, mi ha dato ottime indicazioni per migliorare il mio stile di vita e prevenire problemi futuri.",
            "Ho trovato il dottore molto competente nel suo campo, ha saputo diagnosticare il mio disturbo con precisione e mi ha guidato verso la terapia più adatta.",
            "Il dottore è un professionista eccezionale, attento e competente, mi ha aiutato molto nel gestire il mio problema di salute.",
            "Il dottore è un medico molto gentile e empatico, ha ascoltato le mie preoccupazioni e mi ha fornito un trattamento efficace.",
            "Il dottore è un medico molto gentile e empatico, ha ascoltato le mie preoccupazioni e mi ha fornito un trattamento efficace.",
            "Ho trovato il dottore molto competente nel suo campo, ha saputo diagnosticare il mio disturbo con precisione e mi ha guidato verso la terapia più adatta.",
            "Sono rimasto molto soddisfatto della visita dalla dottoressa, ha spiegato tutto in modo chiaro e mi ha dato ottimi consigli sulla cura della mia condizione.",
            "La dottoressa è un medico molto preparato, mi ha dato ottime indicazioni per migliorare il mio stile di vita e prevenire problemi futuri.",
            "Purtroppo la mia esperienza non è stata positiva, ho avuto difficoltà a comunicare con lei e non mi sono sentito ascoltato durante la visita.",
            "La dottoressa è sempre disponibile a rispondere alle mie domande e dubbi, mi ha supportato durante tutto il percorso di guarigione.",
            "La dottoressa è stata molto gentile e professionale durante la mia visita, mi ha tranquillizzato e mi ha dato fiducia nel percorso di cura.",
            "Ho avuto una buona esperienza con la dottoressa Costa, ha una grande empatia verso i pazienti e si impegna per fornire il miglior trattamento possibile.",
            "Il dottore è un medico molto gentile e empatico, ha ascoltato le mie preoccupazioni e mi ha fornito un trattamento efficace.",
            "La dottoressa è un medico molto preparato, mi ha dato ottime indicazioni per migliorare il mio stile di vita e prevenire problemi futuri.",
            "É una professionista eccezionale, attenta e competente, mi ha aiutato molto nel gestire il mio problema di salute.",
            "La dottoressa è un medico molto preparato, mi ha dato ottime indicazioni per migliorare il mio stile di vita e prevenire problemi futuri."
        ];


        for($i=0; $i<10; $i++){
            $newReview = new Review();
            $newReview->user_name = $usernames[$i];
            $newReview->comment = $recensioni_dottori[rand(0, 9)];
            $newReview->user_mail = $emails[$i];
            $newReview->created_at = $dates[$i];
            $newReview->updated_at = $dates[$i];
            $newReview->doctor_id = $i+1;
            $newReview->save();
        };

        for($i=0; $i<10; $i++){
            $newReview = new Review();
            $newReview->user_name = $usernames[$i+10];
            $newReview->comment = $recensioni_dottori[rand(10, 19)];
            $newReview->user_mail = $emails[$i+10];
            $newReview->created_at = $dates[$i+10];
            $newReview->updated_at = $dates[$i+10];
            $newReview->doctor_id = $i+10;
            $newReview->save();
        };

        for($i=0; $i<15; $i++){
            $newReview = new Review();
            $newReview->user_name = $usernames[rand(0, 19)];
            $newReview->comment = $recensioni_dottori[rand(10, 19)];
            $newReview->user_mail = $emails[rand(0, 19)];
            $newReview->created_at = $dates[$i+1];
            $newReview->updated_at = $dates[$i+1];
            $newReview->doctor_id = rand(11, 20);
            $newReview->save();
        };

        for($i=0; $i<15; $i++){
            $newReview = new Review();
            $newReview->user_name = $usernames[rand(0, 19)];
            $newReview->comment = $recensioni_dottori[rand(0, 9)];
            $newReview->user_mail = $emails[rand(0, 19)];
            $newReview->created_at = $dates[$i+1];
            $newReview->updated_at = $dates[$i+1];
            $newReview->doctor_id = rand(1, 10);
            $newReview->save();
        };


        
    }
}
