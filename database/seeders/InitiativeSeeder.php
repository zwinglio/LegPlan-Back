<?php

namespace Database\Seeders;

use App\Models\Initiative;
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
            Initiative::factory()->count(3)->create([
                'objective_id' => $objective->id,
            ]);
        }
    }
}
