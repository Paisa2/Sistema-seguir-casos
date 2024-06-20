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

            $table->unsignedBigInteger('unidades_adultos');
            $table->foreign('unidades_adultos')->references('id')->on('unidades_adultos')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('unidades_defensorias');
            $table->foreign('unidades_defensorias')->references('id')->on('unidades_defensorias')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('unidades_discapacidades');
            $table->foreign('unidades_discapacidades')->references('id')->on('unidades_discapacidades')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('unidades_slims');
            $table->foreign('unidades_slims')->references('id')->on('unidades_slims')->onUpdate('cascade')->onDelete('cascade');

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
