<?php

namespace Database\Seeders;

use App\Models\User;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $usernames = [
            "MarcoRossi", "LucaBianchi", "GiovanniVerdi", "AntonioRusso", "FrancescoFerrari",
            "PaoloRomano", "AndreaGallo", "DavideCosta", "SimoneConti", "FabioBruno",
            "MariaRizzo", "LauraMarchetti", "GiuliaMancini", "SaraFerri", "AnnaCaruso",
            "FrancescaMoretti", "AlessiaFerrara", "ValentinaPellegrini", "GiorgiaGalli", "ElisaDeLuca"
        ];

        $emails = [];
        for ($i = 0; $i < 20; $i++) {
            $email = strtolower($usernames[$i] . '@email.com');
            array_push($emails, $email);
        }

        $password = "password";

        $now = new DateTime();

        for($i=0; $i<20; $i++){
            DB::table('users')->insert([
                'email' => $emails[$i],
                'password' => Hash::make($password),
                'created_at' => $now,
                'updated_at' => $now
            ]);
        };
    }
}