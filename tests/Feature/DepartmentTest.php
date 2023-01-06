<?php

namespace Tests\Feature;

use App\Models\Department;
use App\Models\Departments;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DepartmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_return_data_in_valid_format(): void
    {
        $department = Department::factory()->create();

        $response = $this->get('/api/departments');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'departments' => [
                    '*' => [
                        'id',
                        'name',
                        'responsible_employee',
                        'employee_role',
                        'email',
                        'phone',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ]);
    }

    public function test_department_is_created_successfully(): void
    {
        $response = $this->post('/api/departments', [
            'name' => 'Test Department',
            'responsible_employee' => 'Test Employee',
            'employee_role' => 'Test Role',
            'email' => 'teste@teste.com',
            'phone' => '123456789',
        ]);

        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'department' => [
                    'id',
                    'name',
                    'responsible_employee',
                    'employee_role',
                    'email',
                    'phone',
                    'created_at',
                    'updated_at',
                ],
            ]);
    }

    public function test_show_department_in_valid_format(): void
    {
        $department = Department::factory()->create();

        $response = $this->get('/api/departments/' . $department->id);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'department' => [
                    'id',
                    'name',
                    'responsible_employee',
                    'employee_role',
                    'email',
                    'phone',
                    'created_at',
                    'updated_at',
                ],
            ]);
    }

    public function test_update_department_successfully(): void
    {
        $department = Department::factory()->create();

        $response = $this->put('/api/departments/' . $department->id, [
            'name' => 'Updated Department',
            'responsible_employee' => 'Updated Employee',
            'employee_role' => 'Test Role Updated',
            'email' => 'updated@email.com',
            'phone' => '123456789',
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'department' => [
                    'id',
                    'name',
                    'responsible_employee',
                    'employee_role',
                    'email',
                    'phone',
                    'created_at',
                    'updated_at',
                ],
            ])
            ->assertJson(
                [
                'department' => [
                    'name' => 'Updated Department',
                    'responsible_employee' => 'Updated Employee',
                    'employee_role' => 'Test Role Updated',
                    'email' => 'updated@email.com',
                    'phone' => '123456789',
                    ]
                ]
            );
    }

    public function test_delete_department_successfully(): void
    {
        $department = Department::factory()->create();

        $response = $this->delete('/api/departments/' . $department->id);

        $response->assertJson([
            'message' => 'Department deleted successfully',
        ]);
    }
}
