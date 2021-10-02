<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table = 'alm_alumno';
    protected $primaryKey = 'alm_id';

    protected $guarded = ['alm_id'];

    public function grado()
    {
        return $this->hasMany(Grado::class, 'grd_id', 'alm_id_grd');
    }

    public static function materiasCursadas($id = null)
    {

        $mxg = MateriaGrado::join('grd_grado', 'grd_grado.grd_id', 'mxg_id_grd')
            ->join('mat_materia', 'mat_materia.mat_id', 'mxg_id_mat')
            ->leftJoin('alm_alumno', 'alm_alumno.alm_id_grd', 'grd_grado.grd_id');

        if($id){
            $mxg -> where('alm_id', $id);
        }

        return $mxg;
    }
}
