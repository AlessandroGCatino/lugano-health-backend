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
        $usernames = ["Alessandro Conti", "Andrea Greco", "Giuseppe Marini", "Giovanni Ferrari", "Alberto Costa", "Davide Russo", "Fabio Vitale", "Francesco Pellegrini", "Mario Barbieri", "Antonio Verdi", "Luca Mancini", "Paolo Bianchi", "Marco Rossi", "Lorenzo Romano", "Simone Moretti", "Stefano Sanna", "Federico Galli", "Roberto Rizzo", "Riccardo Esposito", "Mario Greco"];

        $dates = [ "2023-08-23", "2023-11-06", "2023-10-18", "2023-10-26", "2023-12-20", "2023-07-29", "2023-05-10", "2023-06-14", "2023-08-02", "2023-09-05", "2023-12-27", "2023-08-07", "2023-12-06", "2023-02-14", "2023-08-15", "2023-10-13", "2023-04-14", "2023-06-01", "2023-07-14", "2023-08-30"];

        $emails = [];
        for ($i = 0; $i < 20; $i++) {
            $email = strtolower($usernames[$i] . '@email.com');
            $emails[] = $email;
        }

        $recensioni_dottori = [
            "Il dottor Rossi è un professionista eccezionale, attento e competente, mi ha aiutato molto nel gestire il mio problema di salute.",
            "Sono rimasto molto soddisfatto della visita dalla dottoressa Bianchi, ha spiegato tutto in modo chiaro e mi ha dato ottimi consigli sulla cura della mia condizione.",
            "Il dottor Verdi è un medico molto gentile e empatico, ha ascoltato le mie preoccupazioni e mi ha fornito un trattamento efficace.",
            "Purtroppo la mia esperienza con la dottoressa Moretti non è stata positiva, ho avuto difficoltà a comunicare con lei e non mi sono sentito ascoltato durante la visita.",
            "Consiglio vivamente il dottor Russo, professionale e disponibile, ha risolto il mio problema in modo rapido e efficace.",
            "La dottoressa Conti è un medico molto preparato, mi ha dato ottime indicazioni per migliorare il mio stile di vita e prevenire problemi futuri.",
            "Ho trovato il dottor Ferrari molto competente nel suo campo, ha saputo diagnosticare il mio disturbo con precisione e mi ha guidato verso la terapia più adatta.",
            "La dottoressa Romano è stata molto gentile e professionale durante la mia visita, mi ha tranquillizzato e mi ha dato fiducia nel percorso di cura.",
            "Il dottor Esposito è un professionista eccezionale, attento e competente, mi ha aiutato molto nel gestire il mio problema di salute.",
            "Sono rimasto molto soddisfatto della visita dalla dottoressa Mancini, ha spiegato tutto in modo chiaro e mi ha dato ottimi consigli sulla cura della mia condizione.",
            "Il dottor Marini è un medico molto gentile e empatico, ha ascoltato le mie preoccupazioni e mi ha fornito un trattamento efficace.",
            "La dottoressa Rizzo è un medico molto preparato, mi ha dato ottime indicazioni per migliorare il mio stile di vita e prevenire problemi futuri.",
            "Il dottor Barbieri è un medico molto gentile e empatico, ha ascoltato le mie preoccupazioni e mi ha fornito un trattamento efficace.",
            "La dottoressa Greco è sempre disponibile a rispondere alle mie domande e dubbi, mi ha supportato durante tutto il percorso di guarigione.",
            "Ho trovato il dottor Russo molto competente nel suo campo, ha saputo diagnosticare il mio disturbo con precisione e mi ha guidato verso la terapia più adatta.",
            "Ho avuto una buona esperienza con la dottoressa Costa, ha una grande empatia verso i pazienti e si impegna per fornire il miglior trattamento possibile.",
            "Il dottor Sanna è un medico molto gentile e empatico, ha ascoltato le mie preoccupazioni e mi ha fornito un trattamento efficace.",
            "La dottoressa Ferri è un medico molto preparato, mi ha dato ottime indicazioni per migliorare il mio stile di vita e prevenire problemi futuri.",
            "Il dottor Vitale è un professionista eccezionale, attento e competente, mi ha aiutato molto nel gestire il mio problema di salute.",
            "La dottoressa Pellegrini è un medico molto preparato, mi ha dato ottime indicazioni per migliorare il mio stile di vita e prevenire problemi futuri."
        ];

        for($i=0; $i<20; $i++){
            $newMessage = new Review();
            $newMessage->user_name = $usernames[$i];
            $newMessage->user_mail = $emails[$i];
            $newMessage->comment = $recensioni_dottori[$i];
            $newMessage->date_sent = $dates[$i];
            $newMessage->doctor_id = $i+1;
            $newMessage->save();
        };
    }
}
