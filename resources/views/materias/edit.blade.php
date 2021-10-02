@extends('layouts.app')
@section('headtext', 'Actualizar materia')


@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <div class="row">
                <form action="{{ route('materias.update', $materia->mat_id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="col-sm-12">
                        <label for="nombre"><b>Nombre:</b></label>
                        <input type="text" class="form-control" name="nombre"
                         placeholder="Nombre" value="{{ $materia->mat_nombre }}">
                    </div>
                    <div class="col-sm-12 mt-2">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
