<?php

namespace Database\Seeders;

use App\Models\Vozilo;
use Illuminate\Database\Seeder;

class VoziloSeeder extends Seeder
{
    public function run()
    {
        $vozila = [
            ['marka' => 'BMW', 'model' => 'E30', 'godiste' => 1990, 'registracija' => 'BG-123-AB', 'featured' => false],
            ['marka' => 'Audi', 'model' => 'A4', 'godiste' => 2015, 'registracija' => 'NS-456-CD', 'featured' => true],
            ['marka' => 'Opel', 'model' => 'Corsa', 'godiste' => 2010, 'registracija' => 'KG-789-EF', 'featured' => false],
            ['marka' => 'Toyota', 'model' => 'Yaris', 'godiste' => 2018, 'registracija' => 'NI-321-GH', 'featured' => false],
            ['marka' => 'Mercedes', 'model' => 'W124', 'godiste' => 1992, 'registracija' => 'PA-654-IJ', 'featured' => true],
        ];

        foreach ($vozila as $v) {
            Vozilo::create($v);
        }
    }
}
