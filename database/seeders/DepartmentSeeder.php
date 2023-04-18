<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create(
            [
                'name' => 'Tecnologia da Informação',
                'responsible_id' => User::factory()->create()->id,
                'email' => fake()->safeEmail(),
                'phone' => fake()->phoneNumber(),
            ],
        );

        Department::create(
            [
                'name' => 'Recursos Humanos',
                'responsible_id' => User::factory()->create()->id,
                'email' => fake()->safeEmail(),
                'phone' => fake()->phoneNumber(),
            ],
        );

        Department::create(
            [
                'name' => 'Financeiro',
                'responsible_id' => User::factory()->create()->id,
                'email' => fake()->safeEmail(),
                'phone' => fake()->phoneNumber(),
            ],
        );
    }
}
