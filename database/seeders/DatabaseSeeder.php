<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            FemellesSeeder::class,
            MalesSeeder::class,
            SailliesSeeder::class,
            MisesBasSeeder::class,
            LapereauxSeeder::class,
        ]);
    }
}
