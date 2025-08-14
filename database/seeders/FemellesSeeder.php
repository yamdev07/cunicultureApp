<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // <- Important !

class FemellesSeeder extends Seeder
{
   public function run()
    {
        // Supprime toutes les anciennes données sans déclencher d'erreur FK
        DB::table('femelles')->delete();

        DB::table('femelles')->insert([
            [
                'code' => 'F001',
                'nom' => 'Luna',
                'race' => 'Néerlandaise',
                'origine' => 'Interne',
                'date_naissance' => '2023-01-10',
                'etat' => 'Active',
            ],
            [
                'code' => 'F002',
                'nom' => 'Bella',
                'race' => 'Californienne',
                'origine' => 'Achat',
                'date_naissance' => '2022-11-05',
                'etat' => 'Gestante',
            ],
        ]);
    }

}
