@extends('layouts.app')
@section('headtext', 'Editar alumno')


@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <div class="row">
                <form action="{{ route('alumnos.update', $alumno->alm_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-sm-12">
                        <label for="nombre"><b>Código:</b></label>
                        <input type="text" name="codigo" placeholder="Código (opcional)" class="form-control"
                            value="{{ $alumno->alm_codigo }}">
                    </div>
                    <div class="col-sm-12">
                        <label for="nombre"><b>Nombre:</b></label>
                        <input type="text" name="nombre" placeholder="Nombre" class="form-control"
                            value="{{ $alumno->alm_nombre }}">
                    </div>
                    <div class="col-sm-12">
                        <label for="edad"><b>Edad:</b></label>
                        <input type="number" name="edad" step="1" class="form-control" value="{{ $alumno->alm_edad }}">
                    </div>
                    <div class="col-sm-12">
                        <label for="nombre"><b>Sexo:</b></label>
                        <select name="sexo" class="form-control custom-select">
                            <option value="M" {{ $alumno->alm_sexo != 'M' ?: 'selected' }}>Masculino</option>
                            <option value="F" {{ $alumno->alm_sexo != 'F' ?: 'selected' }}>Femenino</option>
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <label for="nombre"><b>Grados:</b></label>
                        <select name="grado" class="form-control custom-select">
                            @forelse ($grados as $grado)
                                <option value="{{ $grado->grd_id }}"
                                    {{ $alumno->alm_id_grd != $grado->grd_id ?: 'selected' }}>
                                    {{ $grado->grd_nombre }}
                                </option>
                            @empty
                                <option value="" disabled selected>No hay grados</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <label for="nombre"><b>Observacion:</b></label>
                        <textarea name="observacion" cols="30" rows="4" class="form-control"
                            placeholder="Observacion (opcional)">{{ $alumno->alm_observacion }}</textarea>
                    </div>
                    <div class="col-sm-12 mt-2">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
