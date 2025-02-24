<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Spy;
use App\Models\Agency;

class SpySeeder extends Seeder
{
    public function run()
    {
        $mafia = Agency::where('name', 'MAFIA')->first();
        $government = Agency::where('name', 'GOVERMENT')->first();
        $uk = Agency::where('name', 'UK')->first();

        Spy::create([
            'name' => 'Tom',
            'surname' => 'Waits',
            'agency_id' => $mafia->id,
            'country_of_operation' => 'UK',
            'date_of_birth' => '1920-11-11',
        ]);

        Spy::create([
            'name' => 'Nick',
            'surname' => 'Cave',
            'agency_id' => $government->id,
            'country_of_operation' => 'USA',
            'date_of_birth' => '1964-08-18',
        ]);

        Spy::create([
            'name' => 'Eric',
            'surname' => 'Clapton',
            'agency_id' => $government->id,
            'country_of_operation' => 'USA',
            'date_of_birth' => '1958-05-21',
        ]);

        Spy::create([
            'name' => 'Pablo',
            'surname' => 'Escobar',
            'agency_id' => $mafia->id,
            'country_of_operation' => 'Colombia',
            'date_of_birth' => '1960-03-14',
        ]);

        Spy::create([
            'name' => 'Doubleo',
            'surname' => 'Seven',
            'agency_id' => $uk->id,
            'country_of_operation' => 'UK',
            'date_of_birth' => '1975-09-28',
        ]);
    }
}
