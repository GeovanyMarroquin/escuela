<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriaGrado extends Model
{
    use HasFactory;
    protected $table = "mxg_materiasxgrado";
    protected $primaryKey = "mxg_id";

    protected $fillable = ['mxg_id_grd', 'mxg_id_mat'];

    public function materias(){
        return $this->hasMany(Materia::class, 'mat_id', 'mxg_id_mat');
    }

    public function grados(){
        return $this->hasMany(Grado::class, 'grd_id', 'mxg_id_grd');
    }

    public function alumnos(){

    }


    public static function obtenerMateriasxGrados($id = null){
         $query = MateriaGrado::with([
            'materias' => function ($query) {
                $query->select('mat_nombre', 'mat_id');
            },
            'grados' => function ($query) {
                $query->select('grd_nombre', 'grd_id');
                // $query->leftJoin('alm_alumno', 'alm_alumno.alm_id_grd', 'grd_id');
            },
        ]);

        if($id){
            $query->where('mxg_id', $id);
        }

        return $query;
    }
}
