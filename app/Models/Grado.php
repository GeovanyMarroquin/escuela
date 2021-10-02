<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;
    protected $table = "grd_grado";
    protected $primaryKey = "grd_id";


    public function alumnos(){

        return $this->hasMany(Alumno::class, 'alm_id', 'grd_id');
    }

    public function materias(){
        return $this->belongsToMany(MateriaGrado::class, 'mxg_materiasxgrado', 'mxg_id_grd');
    }
}
