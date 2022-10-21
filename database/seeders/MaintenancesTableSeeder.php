<?php

namespace Database\Seeders;

use App\Models\Maintenance;
use Illuminate\Database\Seeder;

class MaintenancesTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        Maintenance::factory()->create([
            'name' => 'Reparación de la PC escritorio Nivel I',
            'price' => 75
        ]);

        Maintenance::factory()->create([
            'name' => 'Reparación de la PC escritorio Nivel II',
            'price' => 150
        ]);

        Maintenance::factory()->create([
            'name' => 'Reparación de la PC escritorio Nivel III',
            'price' => 200
        ]);

        Maintenance::factory()->create([
            'name' => 'Formateo de PC',
            'price' => 250
        ]);

    }
}
