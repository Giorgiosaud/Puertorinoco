<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePaseosFechaEspecial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paseos_fecha_especial', function (Blueprint $table) {
            $table->unsignedInteger('paseo_id')->index();
            $table->foreign('paseo_id')->references('id')->on('paseos')->onDelete('cascade');
            $table->unsignedInteger('fecha_especial_id')->index();
            $table->foreign('fecha_especial_id')->references('id')->on('fechas_especiales')->onDelete('cascade');
            $table->boolean('activa');
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
        Schema::drop('paseos_fecha_especial');
    }
}
