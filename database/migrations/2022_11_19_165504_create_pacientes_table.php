<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $dateFormat = 'd.m.Y';

    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->integer('no_documento');
            $table->string('tipo_documento', 10);
            $table->string('nombres', 30);
            $table->string('apellidos', 30);
            $table->date('fec_nacimiento');
            $table->string('email', 150)->unique();

            $table->primary('no_documento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
};
