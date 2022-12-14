<?php

namespace Database\Factories;

use App\Models\Maintenance;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaintenanceFactory extends Factory
{

    protected $model = Maintenance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(2),
            'price' => $this->faker->randomFloat(2,10,1000),
        ];
    }
}
