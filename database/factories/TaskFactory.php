<?php

namespace Database\Factories;

use App\Models\Action;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $start_date = $this->faker->dateTimeBetween('-3 months', '+3 months');
        $end_date = $this->faker->dateTimeBetween($start_date, '+3 months');

        return [
            'name' => $this->faker->sentence(3, true),
            'description' => $this->faker->sentence(6, true),
            'status' => $this->faker->randomElement(['not_started', 'pending', 'in_progress', 'review', 'completed']),
            'priority' => $this->faker->randomElement(['Baixa', 'Média', 'Alta']),
            'start_date' => $start_date,
            'end_date' => $end_date,
            'action_id' => Action::all()->random()->id,
            'department_id' => Department::all()->random()->id,
        ];
    }
}
