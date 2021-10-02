<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Grado;
use App\Models\Materia;
use App\Models\MateriaGrado;
use Illuminate\Http\Request;

class MateriaGradoController extends Controller
{

    public function index()
    {

        $materiasxgrado = MateriaGrado::obtenerMateriasxGrados()->get();


        // return $materiasxgrado;

        return view('materiasxgrado.index', compact('materiasxgrado'));
    }

    public function create()
    {
        $materias = Materia::get(['mat_nombre', 'mat_id']);
        $grados = Grado::get(['grd_nombre', 'grd_id']);
        return view('materiasxgrado.create', compact('materias', 'grados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mat_id' => 'required',
            'grd_id' => 'required',
        ], [
            'mat_id.required' => 'La materia es requerida',
            'grd_id.required' => 'El grado es requerido',
        ]);

        DB::beginTransaction();
        $materia = new MateriaGrado();
        $materia->mxg_id_grd = $request->input('grd_id');
        $materia->mxg_id_mat = $request->input('mat_id');
        $materia->save();

        DB::commit();

        alert('Exito!', 'Creado exitosamente', 'success');

        return redirect()->route('materiasxgrado.index');
    }

    public function edit($id)
    {
        // $materia = MateriaGrado::find($id, ['mxg_id', 'mat_id']);
        $mxg = MateriaGrado::obtenerMateriasxGrados($id)
            ->first();

        $materias = Materia::get(['mat_nombre', 'mat_id']);
        $grados = Grado::get(['grd_nombre', 'grd_id']);

        return view('materiasxgrado.edit', compact('materias', 'grados', 'mxg'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mat_id' => 'required',
            'grd_id' => 'required',
        ], [
            'mat_id.required' => 'La materia es requerida',
            'grd_id.required' => 'El grado es requerido',
        ]);

        DB::beginTransaction();
        $materia = MateriaGrado::find($id);
        $materia->mxg_id_grd = $request->input('grd_id');
        $materia->mxg_id_mat = $request->input('mat_id');
        $materia->update();

        DB::commit();

        alert('Exito!', 'Actualizado exitosamente', 'success');

        return redirect()->route('materiasxgrado.index');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        if (!MateriaGrado::find($id)->delete()) {
            return json_encode([
                'success' => false,
                'msg' => 'Ocurrio un error, contacte con el admin.'
            ]);
        }


        DB::commit();

        return json_encode([
            'success' => true,
            'msg' => 'Eliminada correctamente.',
            'location' => route('materias.index')
        ]);
    }
}
