<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaVotacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votacao', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 8)->unique();

            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categoria');

            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('users');

            $table->string('titulo', 80);
            $table->text('descricao')->nullable();
            $table->timestamp('datahora_inicio');
            $table->timestamp('datahora_fim')->nullable();
            $table->boolean('publica');
            $table->string('foto_capa', 250)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votacao');
    }
}
