<?php

namespace Database\Factories;

use App\Models\Objective;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Action>
 */
class ActionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3, true),
            'start_date' => '2022-01-01', // $this->faker->date()
            'end_date' => '2022-12-31', // $this->faker->date()
            'objective_id' => Objective::all()->random()->id,
        ];
    }
}
