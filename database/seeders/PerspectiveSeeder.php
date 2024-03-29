<?php

namespace Database\Seeders;

use App\Models\Perspective;
use Illuminate\Database\Seeder;

class PerspectiveSeeder extends Seeder
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
        ]);

        Perspective::create([
            'name' => 'Processos Internos',
        ]);

        Perspective::create([
            'name' => 'Aprendizado e Crescimento',
        ]);

        Perspective::create([
            'name' => 'Orçamento, Estrutura e Funcionamento',
        ]);
    }
}
