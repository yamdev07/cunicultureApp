<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LapereauxSeeder extends Seeder
{
    public function run()
    {
        DB::table('lapereaux')->insert([
            [
                'mise_bas_id' => 1,
                'age_semaines' => 1,
                'categorie' => '<5 semaines',
                'alimentation_jour' => 0.10,
                'alimentation_semaine' => 0.70,
            ],
            [
                'mise_bas_id' => 1,
                'age_semaines' => 6,
                'categorie' => '5-8 semaines',
                'alimentation_jour' => 0.20,
                'alimentation_semaine' => 1.40,
            ],
        ]);
    }
}
