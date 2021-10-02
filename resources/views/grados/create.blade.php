@extends('layouts.app')
@section('headtext', 'Crear grado')


@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <div class="row">
                <form action="{{ route('grados.store') }}" method="POST">
                    @csrf
                    <div class="col-sm-12">
                        <label for="nombre"><b>Nombre:</b></label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="col-sm-12 mt-2">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
