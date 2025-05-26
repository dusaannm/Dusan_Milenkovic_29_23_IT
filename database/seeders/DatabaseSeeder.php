<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@pwa.rs',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Editor',
            'email' => 'editor@pwa.rs',
            'password' => Hash::make('editor'),
            'role' => 'editor',
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@pwa.rs',
            'password' => Hash::make('user'),
            'role' => 'user',
        ]);
        
        $this->call([
        VoziloSeeder::class,
        UslugaSeeder::class,
        PregledSeeder::class,
    ]);
    }
}

