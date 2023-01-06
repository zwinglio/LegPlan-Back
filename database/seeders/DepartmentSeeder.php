<?php

namespace Database\Seeders;

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
                'responsible_employee' => fake()->name(),
                'employee_role' => 'Analista de Sistemas',
                'email' => fake()->safeEmail(),
                'phone' => fake()->phoneNumber(),
            ],
        );

        Department::create(
            [
                'name' => 'Recursos Humanos',
                'responsible_employee' => fake()->name(),
                'employee_role' => 'Analista de Recursos Humanos',
                'email' => fake()->safeEmail(),
                'phone' => fake()->phoneNumber(),
            ],
        );

        Department::create(
            [
                'name' => 'Financeiro',
                'responsible_employee' => fake()->name(),
                'employee_role' => 'Analista de Financeiro',
                'email' => fake()->safeEmail(),
                'phone' => fake()->phoneNumber(),
            ],
        );
    }
}
