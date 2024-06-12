<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casos', function (Blueprint $table) {
            $table->id();
            $table->integer('num_caso')->unique();
            $table->string('tipologia')->unique();
            $table->string('descripcion');
            $table->date('fecha_registro');
            $table->string('nom_demandante');
            $table->string('nom_demandado');
            $table->string('estado');

            $table->unsignedBigInteger('unidad');
            $table->foreign('unidad')->references('id')->on('unidades')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('casos');
    }
}
