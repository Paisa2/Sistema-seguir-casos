<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasosDenunciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casos_denuncias', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('caso_id');
            $table->foreign('caso_id')->references('id')->on('casos')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('denuncia_id');
            $table->foreign('denuncia_id')->references('id')->on('denuncias')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('casos_denuncias');
    }
}
