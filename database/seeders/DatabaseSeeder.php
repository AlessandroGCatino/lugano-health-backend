<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // $usernames = [
        //     "MarcoRossi", "LucaBianchi", "GiovanniVerdi", "AntonioRusso", "FrancescoFerrari",
        //     "PaoloRomano", "AndreaGallo", "DavideCosta", "SimoneConti", "FabioBruno",
        //     "MariaRizzo", "LauraMarchetti", "GiuliaMancini", "SaraFerri", "AnnaCaruso",
        //     "FrancescaMoretti", "AlessiaFerrara", "ValentinaPellegrini", "GiorgiaGalli", "ElisaDeLuca"
        // ];

        // $emails = [];
        // for ($i = 0; $i < 20; $i++) {
        //     $email = strtolower($usernames[$i] . '@email.com');
        //     array_push($emails, $email);
        // }

        // $password = "password";

        // $now = new DateTime();

        // for($i=0; $i<20; $i++){
        //     DB::table('users')->insert([
        //         'email' => $emails[$i],
        //         'password' => Hash::make($password),
        //         'created_at' => $now,
        //         'updated_at' => $now
        //     ]);
        // };

        

        $this->call([
            UserSeeder::class,
            DoctorSeeder::class,
            SpecializationSeeder::class,
            MessageSeeder::class,
            ReviewSeeder::class,
            SponsorizationSeeder::class,
            VoteSeeder::class
        ]);
    }
}
