<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriaGradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mxg_materiasxgrado', function (Blueprint $table) {
            $table->bigIncrements('mxg_id');
            $table->foreignId('mxg_id_grd')->constrained('grd_grado', 'grd_id');
            $table->foreignId('mxg_id_mat')->constrained('mat_materia', 'mat_id');

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
        Schema::dropIfExists('materia_grados');
    }
}
