<?php

namespace Database\Seeders;

use App\Models\Pregled;
use App\Models\Vozilo;
use Illuminate\Database\Seeder;

class PregledSeeder extends Seeder
{
    public function run()
    {
        $vozila = Vozilo::all();

        foreach (range(1, 10) as $i) {
            $vozilo = $vozila->random();

            Pregled::create([
                'vozilo_id' => $vozilo->id,
                'user_id' => 1, // 👈 obavezno ovo dodaj
                'datum' => now()->addDays(rand(0, 10))->format('Y-m-d'),
                'vreme' => rand(8, 15) . ':00',
            ]);
        }
    }
}


