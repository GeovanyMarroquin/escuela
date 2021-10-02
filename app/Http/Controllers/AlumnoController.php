<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Grado;
use App\Models\Alumno;
use App\Models\MateriaGrado;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class AlumnoController extends Controller
{

    public function index()
    {
        $alumnos = Alumno::with([
            'grado' => function ($query) {
                $query->select('grd_id', 'grd_nombre');
            }
        ])->get();

        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        $grados = Grado::get(['grd_nombre', 'grd_id']);
        return view('alumnos.create', compact('grados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'edad' => 'required',
            'sexo' => 'required',
            'grado' => 'required',
        ]);

        DB::beginTransaction();
        $alumno = new Alumno();
        $alumno->alm_codigo = !empty($request->input('codigo'))
            ? $request->input('codigo')
            : mb_strtoupper(Str::random(8));

        $alumno->alm_nombre = $request->input('nombre');
        $alumno->alm_edad = $request->input('edad');
        $alumno->alm_sexo = $request->input('sexo');
        $alumno->alm_id_grd = $request->input('grado');
        $alumno->alm_observacion = $request->input('observacion');
        $alumno->save();

        DB::commit();

        alert('Exito!', 'Alumno creado exitosamente', 'success');

        return redirect()->route('alumnos.index');
    }

    public function edit($id)
    {
        $grados = Grado::get(['grd_nombre', 'grd_id']);
        $alumno = Alumno::find($id);


        return view('alumnos.edit', compact('grados', 'alumno'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'edad' => 'required',
            'sexo' => 'required',
            'grado' => 'required',
        ]);

        DB::beginTransaction();
        $alumno = Alumno::find($id);
        $alumno->alm_codigo = !empty($request->input('codigo'))
            ? $request->input('codigo')
            : mb_strtoupper(Str::random(8));

        $alumno->alm_nombre = $request->input('nombre');
        $alumno->alm_edad = $request->input('edad');
        $alumno->alm_sexo = $request->input('sexo');
        $alumno->alm_id_grd = $request->input('grado');
        $alumno->alm_observacion = $request->input('observacion');
        $alumno->update();

        DB::commit();

        alert('Exito!', 'Alumno actualizado exitosamente', 'success');

        return redirect()->route('alumnos.index');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        if (!Alumno::find($id)->delete()) {
            return json_encode([
                'success' => false,
                'msg' => 'Ocurrio un error, contacte con el admin.'
            ]);
        }
        DB::commit();

        return json_encode([
            'success' => true,
            'msg' => 'Alumno eliminado correctamente.',
            'location' => route('alumnos.index')
        ]);
    }


    public function verInformacionAlumno()
    {
        $valor = request('valor');

        $alumnos = Alumno::with('grado');

        $mxg = MateriaGrado::join('mat_materia', 'mat_materia.mat_id', 'mxg_id_mat')
            ->join('grd_grado', 'grd_grado.grd_id', 'mxg_id_grd')
            ->select('grd_id', 'mat_nombre')
            ->get();


        if ($valor == 'all') {
            $alumnos = $alumnos->get();
        } else {
            $alumnos =  $alumnos->where('alm_id', $valor)->first();
        }


        return json_encode([
            'mxg' => $mxg,
            'alumnos' => $alumnos
        ]);
    }
}
