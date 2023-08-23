<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaCandidatoVotacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidato_votacao', function (Blueprint $table) {
            $table->unsignedBigInteger('votacao_id');
            $table->foreign('votacao_id')->references('id')->on('votacao');

            $table->unsignedBigInteger('candidato_id');
            $table->foreign('candidato_id')->references('id')->on('candidato');

            $table->primary(['votacao_id', 'candidato_id'])->unique();

            $table->smallInteger('pontos')->deafult(0);
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
        Schema::dropIfExists('candidato_votacao');
    }
}
