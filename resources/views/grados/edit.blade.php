@extends('layouts.app')
@section('headtext', 'Actualizar grado')


@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <div class="row">
                <form action="{{ route('grados.update', $grado->grd_id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="col-sm-12">
                        <label for="nombre"><b>Nombre:</b></label>
                        <input type="text" class="form-control" name="nombre"
                         placeholder="Nombre" value="{{ $grado->grd_nombre }}">
                    </div>
                    <div class="col-sm-12 mt-2">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
