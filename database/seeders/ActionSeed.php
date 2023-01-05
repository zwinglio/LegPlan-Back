<?php

namespace Database\Seeders;

use App\Models\Action;
use App\Models\Objective;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Action::factory(30)->create();
    }
}
