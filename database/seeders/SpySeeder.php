<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Spy;

class SpySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Spy::create([
            'name' => 'Tom',
            'surname' => 'Waits',
            'agency_id' => 1,
            'country_of_operation' => 'UK',
            'date_of_birth' => '1920-11-11',
            'date_of_death' => null,
        ]);

        Spy::create([
            'name' => 'Nick',
            'surname' => 'Cave',
            'agency_id' => 2,
            'country_of_operation' => 'USA',
            'date_of_birth' => '1964-08-18',
            'date_of_death' => null,
        ]);

        Spy::create([
            'name' => 'Eric',
            'surname' => 'Clapton',
            'agency_id' => 2,
            'country_of_operation' => 'USA',
            'date_of_birth' => '1964-08-18',
            'date_of_death' => null,
        ]);
    }
}
