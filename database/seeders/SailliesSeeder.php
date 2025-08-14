<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SailliesSeeder extends Seeder
{
    public function run()
    {
        DB::table('saillies')->insert([
            [
                'femelle_id' => 1,  // Luna
                'male_id' => 1,     // Max
                'date_saillie' => '2025-07-01',
                'date_palpage' => '2025-07-15',
                'palpation_resultat' => '+',
                'date_mise_bas_theorique' => '2025-09-30',
            ],
            [
                'femelle_id' => 2,  // Bella
                'male_id' => 2,     // Rocky
                'date_saillie' => '2025-07-05',
                'date_palpage' => '2025-07-20',
                'palpation_resultat' => '-',
                'date_mise_bas_theorique' => '2025-10-05',
            ],
        ]);
    }
}
