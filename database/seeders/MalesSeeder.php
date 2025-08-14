<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MalesSeeder extends Seeder
{
    public function run()
    {
        DB::table('males')->insert([
            [
                'code' => 'M001',
                'nom' => 'Max',
                'race' => 'Néerlandaise',
                'origine' => 'Interne',
                'date_naissance' => '2022-05-12',
            ],
            [
                'code' => 'M002',
                'nom' => 'Rocky',
                'race' => 'Californienne',
                'origine' => 'Achat',
                'date_naissance' => '2021-12-20',
            ],
        ]);
    }
}
