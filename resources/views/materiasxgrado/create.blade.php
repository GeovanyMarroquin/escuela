@extends('layouts.app')
@section('headtext', 'Materias y grados')


@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <div class="row">
                <form action="{{ route('materiasxgrado.store') }}" method="POST">
                    @csrf
                    <div class="col-sm-12">
                        <label for="nombre"><b>Materia:</b></label>
                        <select name="mat_id" class="form-control custom-select">
                            @forelse ($materias as $materia)
                                <option value="{{ $materia->mat_id }}">
                                    {{ $materia->mat_nombre }}
                                </option>
                            @empty
                                <option value="" disabled selected>No hay materias</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <label for="nombre"><b>Grados:</b></label>
                        <select name="grd_id" class="form-control custom-select">
                            @forelse ($grados as $grado)
                                <option value="{{ $grado->grd_id }}">
                                    {{ $grado->grd_nombre}}
                                </option>
                            @empty
                                <option value="" disabled selected>No hay grados</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="col-sm-12 mt-2">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
