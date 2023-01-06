<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name' => 'Câmara Municipal de Parnamirim',
            'mission' => 'Representar a população, legislando e fiscalizando de forma participativa com a sociedade, visando o desenvolvimento sustentável de Parnamirim/RN.',
            'vision' => 'Ser referência nacional nas funções legislativas, sendo reconhecida como instituição essencial à satisfação dos interesses da sociedade.',
            'values' => 'Autonomia | Comprometimento | Ética | Excelência | Inovação | Transparência | Valorização do Servidor',
            'plan_start_date' => '2022-01-01',
            'plan_end_date' => '2030-12-31',
        ]);
    }
}
