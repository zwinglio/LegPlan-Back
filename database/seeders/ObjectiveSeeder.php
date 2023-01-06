<?php

namespace Database\Seeders;

use App\Models\Objective;
use App\Models\Perspective;
use Illuminate\Database\Seeder;

class ObjectiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perspectives = Perspective::all();

        foreach ($perspectives as $perspective) {
            Objective::factory()->count(2)->create([
                'perspective_id' => $perspective->id,
            ]);
        }
    }
}
