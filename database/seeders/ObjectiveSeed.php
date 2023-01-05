<?php

namespace Database\Seeders;

use App\Models\Objective;
use App\Models\Perspective;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\Cast\Object_;

class ObjectiveSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Objective::factory(12)->create();

        // Objective::create([
        //     'name' => 'Promover a participação popular nas ações do poder legislativo',
        //     'perspective_id' => Perspective::where('name', 'Resultados Institucionais')->first()->id,
        // ]);

        // Objective::create([
        //     'name' => 'Promover a modernização e a celeridade dos processos',
        //     'perspective_id' => Perspective::where('name', 'Processos Internos')->first()->id,
        // ]);

        // Objective::create([
        //     'name' => 'Investir e assegurar a capacitação continuada e especializada do servidor',
        //     'perspective_id' => Perspective::where('name', 'Aprendizado e Crescimento')->first()->id,
        // ]);

        // Objective::create([
        //     'name' => 'Promover a valorização, a motivação e a justiça remuneratória do servidor',
        //     'perspective_id' => Perspective::where('name', 'Aprendizado e Crescimento')->first()->id,
        // ]);
    }
}
