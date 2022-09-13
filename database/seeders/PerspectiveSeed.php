<?php

namespace Database\Seeders;

use App\Models\Perspective;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerspectiveSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Perspective::create([
            'name' => 'Resultados Institucionais',
        ])->objectives()->createMany([
            [
                'name' => 'Promover a participação popular nas ações do poder legislativo',
            ],
        ]);

        Perspective::create([
            'name' => 'Processos Internos',
        ])->objectives()->createMany([
            [
                'name' => 'Promover a modernização e a celeridade dos processos',
            ],
        ]);

        Perspective::create([
            'name' => 'Aprendizado e Crescimento',
        ])->objectives()->createMany([
            [
                'name' => 'Investir e assegurar a capacitação continuada e especializada do servidor',
            ],
            [
                'name' => 'Promover a valorização, a motivação e a justiça remuneratória do servidor',
            ]
        ]);

        Perspective::create([
            'name' => 'Orçamento, Estrutura e Funcionamento',
        ]);
    }
}
