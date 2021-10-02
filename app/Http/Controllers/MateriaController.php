<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index()
    {

        $materias = Materia::get(['mat_nombre', 'mat_id']);
        return view('materias.index', compact('materias'));
    }

    public function create()
    {
        return view('materias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        DB::beginTransaction();
        $materia = new Materia();
        $materia->mat_nombre = $request->input('nombre');
        $materia->save();

        DB::commit();

        alert('Exito!', 'Materia creada exitosamente', 'success');

        return redirect()->route('materias.index');
    }

    public function edit($id)
    {
        $materia = Materia::find($id,['mat_nombre', 'mat_id']);
        return view('materias.edit', compact('materia'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        DB::beginTransaction();
        $materia = Materia::find($id);
        $materia->mat_nombre = $request->input('nombre');
        $materia->update();

        DB::commit();

        alert('Exito!', 'Materia actualizada exitosamente', 'success');

        return redirect()->route('materias.index');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        if (!Materia::find($id)->delete()) {
            return json_encode([
                'success' => false,
                'msg' => 'Ocurrio un error, contacte con el admin.'
            ]);
        }


        DB::commit();

        return json_encode([
            'success' => true,
            'msg' => 'Materia eliminada correctamente.',
            'location' => route('materias.index')
        ]);
    }
}
