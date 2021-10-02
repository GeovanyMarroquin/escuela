<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('alm_alumno', function (Blueprint $table) {
            $table->bigIncrements('alm_id');
            $table->string('alm_codigo', 100);
            $table->string('alm_nombre', 300);
            $table->char('alm_edad', 4);
            $table->char('alm_sexo', 4);
            $table->foreignId('alm_id_grd')->constrained('grd_grado', 'grd_id');
            $table->string('alm_observacion', 300)->nullable();
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
        Schema::dropIfExists('alumnos');
    }
}
