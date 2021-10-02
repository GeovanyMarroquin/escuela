<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Grado;
use Illuminate\Http\Request;

class GradoController extends Controller
{
    public function index()
    {

        $grados = Grado::get(['grd_nombre', 'grd_id']);
        return view('grados.index', compact('grados'));
    }

    public function create()
    {
        return view('grados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        DB::beginTransaction();
        $grado = new Grado();
        $grado->grd_nombre = $request->input('nombre');
        $grado->save();

        DB::commit();

        alert('Exito!', 'Grado creado exitosamente', 'success');

        return redirect()->route('grados.index');
    }

    public function edit($id)
    {
        $grado = Grado::find($id, ['grd_nombre', 'grd_id']);
        return view('grados.edit', compact('grado'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        DB::beginTransaction();
        $grado = Grado::find($id);
        $grado->grd_nombre = $request->input('nombre');
        $grado->update();

        DB::commit();

        alert('Exito!', 'Grado actualizado exitosamente', 'success');

        return redirect()->route('grados.index');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        if(!Grado::find($id)->delete()){
            return json_encode([
                'success' => false,
                'msg' => 'Ocurrio un error, contacte con el admin.'
            ]);
        }
        DB::commit();

        return json_encode([
            'success' => true,
            'msg' => 'Grado eliminado correctamente.',
            'location' => route('grados.index')
        ]);

    }
}
