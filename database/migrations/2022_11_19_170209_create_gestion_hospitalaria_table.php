<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestion_hospitalarias', function (Blueprint $table) {
            $table->increments('id_hospitalizacion');
            $table->string('tipo_documento', 10);
            $table->integer('no_doc_paciente');
            $table->foreign('no_doc_paciente')->references('no_documento')->on('pacientes');
            $table->integer('cod_hospital');
            $table->foreign('cod_hospital')->references('cod_hospital')->on('hospitales');
            $table->date('fec_ingreso');
            $table->date('fec_salida')->nullable();
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
        Schema::dropIfExists('gestion_hospitalaria');
    }
};
