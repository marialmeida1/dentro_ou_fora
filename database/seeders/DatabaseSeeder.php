<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Candidato::factory(10)->create();
        \App\Models\Categoria::factory(2)->create();
        \App\Models\Votacao::factory(2)->create();

        $this->call([
            CategoriaCandidatoSeeder::class,
            CandidatoVotacaoSeeder::class,
        ]);
    }
}
