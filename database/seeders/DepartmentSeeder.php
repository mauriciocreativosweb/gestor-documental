<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departments;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Departments::create([
            'departmentName' => 'No definido'
        ]);

        Departments::create([
            'departmentName' => 'Amazonas'
        ]);

        Departments::create([
            'departmentName' => 'Antioquia'
        ]);

        Departments::create([
            'departmentName' => 'Arauca'
        ]);

        Departments::create([
            'departmentName' => 'Atlántico'
        ]);

        Departments::create([
            'departmentName' => 'Bogotá'
        ]);

        Departments::create([
            'departmentName' => 'Bolívar'
        ]);

        Departments::create([
            'departmentName' => 'Boyacá'
        ]);

        Departments::create([
            'departmentName' => 'Caldas'
        ]);

        Departments::create([
            'departmentName' => 'Caquetá'
        ]);

        Departments::create([
            'departmentName' => 'Casanare'
        ]);

        Departments::create([
            'departmentName' => 'Cauca'
        ]);

        Departments::create([
            'departmentName' => 'Cesar'
        ]);

        Departments::create([
            'departmentName' => 'Chocó'
        ]);

        Departments::create([
            'departmentName' => 'Córdoba'
        ]);

        Departments::create([
            'departmentName' => 'Cundinamarca'
        ]);

        Departments::create([
            'departmentName' => 'Guainía'
        ]);

        Departments::create([
            'departmentName' => 'Guaviare'
        ]);

        Departments::create([
            'departmentName' => 'Huila'
        ]);

        Departments::create([
            'departmentName' => 'La Guajira'
        ]);

        Departments::create([
            'departmentName' => 'Magdalena'
        ]);

        Departments::create([
            'departmentName' => 'Meta'
        ]);

        Departments::create([
            'departmentName' => 'Nariño'
        ]);

        Departments::create([
            'departmentName' => 'Norte de Santander'
        ]);

        Departments::create([
            'departmentName' => 'Putumayo'
        ]);

        Departments::create([
            'departmentName' => 'Quindío'
        ]);

        Departments::create([
            'departmentName' => 'Risaralda'
        ]);

        Departments::create([
            'departmentName' => 'San Andres'
        ]);

        Departments::create([
            'departmentName' => 'Santander'
        ]);

        Departments::create([
            'departmentName' => 'Sucre'
        ]);

        Departments::create([
            'departmentName' => 'Tolima'
        ]);

        Departments::create([
            'departmentName' => 'Valle del cauca'
        ]);

        Departments::create([
            'departmentName' => 'Vaupés'
        ]);

        Departments::create([
            'departmentName' => 'Vichada'
        ]);
    }
}
