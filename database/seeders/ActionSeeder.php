<?php

namespace Database\Seeders;

use App\Models\Action;
use App\Models\Initiative;
use App\Models\Objective;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $initiative = Initiative::all();

        foreach ($initiative as $initiative) {
            Action::factory()->count(3)->create([
                'initiative_id' => $initiative->id,
            ]);
        }
    }
}
