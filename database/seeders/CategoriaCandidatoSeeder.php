<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaCandidatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria_candidato')->insert([
            'categoria_id' => 1,
            'candidato_id' => 1,
            'created_at' => '2023-08-17 00:00:00',
            'updated_at' => '2023-08-17 00:00:00',
        ]);

        DB::table('categoria_candidato')->insert([
            'categoria_id' => 1,
            'candidato_id' => 2,
            'created_at' => '2023-08-17 00:00:00',
            'updated_at' => '2023-08-17 00:00:00',
        ]);

        DB::table('categoria_candidato')->insert([
            'categoria_id' => 1,
            'candidato_id' => 3,
            'created_at' => '2023-08-17 00:00:00',
            'updated_at' => '2023-08-17 00:00:00',
        ]);

        DB::table('categoria_candidato')->insert([
            'categoria_id' => 1,
            'candidato_id' => 4,
            'created_at' => '2023-08-17 00:00:00',
            'updated_at' => '2023-08-17 00:00:00',
        ]);

        DB::table('categoria_candidato')->insert([
            'categoria_id' => 1,
            'candidato_id' => 5,
            'created_at' => '2023-08-17 00:00:00',
            'updated_at' => '2023-08-17 00:00:00',
        ]);

        DB::table('categoria_candidato')->insert([
            'categoria_id' => 2,
            'candidato_id' => 2,
            'created_at' => '2023-08-17 00:00:00',
            'updated_at' => '2023-08-17 00:00:00',
        ]);

        DB::table('categoria_candidato')->insert([
            'categoria_id' => 2,
            'candidato_id' => 3,
            'created_at' => '2023-08-17 00:00:00',
            'updated_at' => '2023-08-17 00:00:00',
        ]);

        DB::table('categoria_candidato')->insert([
            'categoria_id' => 1,
            'candidato_id' => 8,
            'created_at' => '2023-08-17 00:00:00',
            'updated_at' => '2023-08-17 00:00:00',
        ]);
    }
}
