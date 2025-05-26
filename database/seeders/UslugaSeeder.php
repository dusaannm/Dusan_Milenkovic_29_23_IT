<?php

namespace Database\Seeders;

use App\Models\Usluga;
use Illuminate\Database\Seeder;

class UslugaSeeder extends Seeder
{
    public function run()
    {
        $usluge = [
            ['naziv' => 'Osnovni tehnički', 'opis' => 'Provera osnovnih funkcija vozila.', 'cena' => 3500, 'featured' => true],
            ['naziv' => 'Kompletna provera', 'opis' => 'Detaljna analiza sistema i dokumenata.', 'cena' => 5500, 'featured' => false],
            ['naziv' => 'Tehnički + registracija', 'opis' => 'Sve na jednom mestu.', 'cena' => 8500, 'featured' => true],
        ];

        foreach ($usluge as $u) {
            Usluga::create($u);
        }
    }
}

