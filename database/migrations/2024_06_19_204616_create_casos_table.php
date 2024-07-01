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
            $table->string('numero_caso')->nullable();
            $table->string('tipologia_caso')->nullable();
            $table->string('responsable_caso')->nullable();
            $table->string('etapa_caso')->nullable();
            $table->date('fecha_registro')->nullable();
            $table->text('derivar_casos')->nullable();
            $table->string('image')->nullable();
            $table->string('denunciante_nombre')->nullable();
            $table->string('denunciante_apellido')->nullable();
            $table->string('denunciante_ci')->nullable();
            $table->string('denunciante_sexo')->nullable();
            $table->integer('denunciante_edad')->nullable();
            $table->string('denunciante_ocupacion')->nullable();
            $table->string('denunciante_estado_civil')->nullable();
            $table->string('denunciante_telefono')->nullable();
            $table->string('denunciado_nombre')->nullable();
            $table->string('denunciado_apellido')->nullable();
            $table->string('denunciado_ci')->nullable();
            $table->string('denunciado_sexo')->nullable();
            $table->integer('denunciado_edad')->nullable();
            $table->string('denunciado_telefono')->nullable();
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
