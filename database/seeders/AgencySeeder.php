<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Agency;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Agency::create([
          'name' => 'MAFIA',
      ]);

      Agency::create([
            'name' => 'GOVERMENT',
      ]);

      Agency::create([
            'name' => 'UK',
      ]);
    }
}
