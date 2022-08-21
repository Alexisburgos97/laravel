<?php

use Illuminate\Database\Seeder;

class MaintenancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Maintenance')->create([
            'name' => 'Reparación de la PC escritorio Nivel I',
            'price' => 75
        ]);

        factory('App\Models\Maintenance')->create([
            'name' => 'Reparación de la PC escritorio Nivel II',
            'price' => 150
        ]);

        factory('App\Models\Maintenance')->create([
            'name' => 'Reparación de la PC escritorio Nivel III',
            'price' => 200
        ]);

        factory('App\Models\Maintenance')->create([
            'name' => 'Formateo de PC',
            'price' => 250
        ]);

    }
}
