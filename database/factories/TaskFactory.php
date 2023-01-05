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
        return [
            'name' => $this->faker->sentence(3, true),
            'description' => $this->faker->sentence(6, true),
            'status' => $this->faker->randomElement(['Planejamento', 'Em progresso', 'Concluída']),
            'priority' => $this->faker->randomElement(['Baixa', 'Média', 'Alta']),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'action_id' => Action::all()->random()->id,
            'department_id' => Department::all()->random()->id,
        ];
    }
}
