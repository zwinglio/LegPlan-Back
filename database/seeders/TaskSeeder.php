<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\Action;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actions = Action::all();

        foreach ($actions as $action) {
            Task::factory()->count(5)->create([
                'action_id' => $action->id,
            ]);
        }
    }
}
