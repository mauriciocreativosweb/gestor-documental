<?php

namespace Database\Seeders;

use App\Models\TypePerson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypePersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypePerson::created([
            'typePersonName' => 'No definido'
        ]);

        TypePerson::created([
             'typePersonName' => 'Natural'
        ]);

        TypePerson::created([
            'typePersonName' => 'Jurídica'
       ]);
    }
}
