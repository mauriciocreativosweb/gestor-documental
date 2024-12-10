<?php

namespace Database\Seeders;

use App\Models\Typologies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Typologies::created([
            'typologyName' => 'No asignado'
        ]);
        Typologies::created([
            'typologyName' => 'Spa'
        ]);

        Typologies::created([
            'typologyName' => 'Centro de estética'
        ]);
    }
}
