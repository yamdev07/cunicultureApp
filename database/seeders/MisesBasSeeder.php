<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MisesBasSeeder extends Seeder
{
    public function run()
    {
        DB::table('mises_bas')->insert([
            [
                'saillie_id' => 1,
                'date_mise_bas' => '2025-09-30',
                'nb_vivant' => 5,
                'nb_mort_ne' => 0,
                'nb_retire' => 0,
                'nb_adopte' => 0,
                'date_sevrage' => '2025-11-30',
                'poids_moyen_sevrage' => 1.25,
            ],
        ]);
    }
}
