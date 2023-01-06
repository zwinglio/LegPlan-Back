<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitiativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objectives = \App\Models\Objective::all();

        foreach ($objectives as $objective) {
            \App\Models\Initiative::factory()->count(3)->create([
                'objective_id' => $objective->id,
            ]);
        }
    }
}
