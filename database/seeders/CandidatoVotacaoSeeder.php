<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidatoVotacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('candidato_votacao')->insert([
            'votacao_id' => 1,
            'candidato_id' => 1,
            'pontos' => 2,
        ]);

        DB::table('candidato_votacao')->insert([
            'votacao_id' => 2,
            'candidato_id' => 1,
            'pontos' => 1,
        ]);

        DB::table('candidato_votacao')->insert([
            'votacao_id' => 2,
            'candidato_id' => 2,
            'pontos' => 3,
        ]);

        DB::table('candidato_votacao')->insert([
            'votacao_id' => 2,
            'candidato_id' => 3,
            'pontos' => 70,
        ]);
    }
}
