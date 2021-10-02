@extends('layouts.app')

@section('headtext', 'Inicio')
@section('title', 'Inicio')


@section('content')
    <div class="card mt-3">
        <div class="card-header">
            <select name="alumnos" id="sltAlumnos" class="custom-select form-control w-25">
                <option value="all" selected>Todos</option>
                @foreach ($alumnos as $alumno)
                    <option value="{{ $alumno->alm_id }}">{{ $alumno->alm_nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="card-body">
            <table class="table table-borderless table-responsive card-1 p-4">
                <thead>
                    <tr class="border-bottom">
                        <th> <span class="ml-2">Alumno</span> </th>
                        <th> <span class="ml-2">Grado</span> </th>
                        <th> <span class="ml-2">Materias</span> </th>
                    </tr>
                </thead>
                <tbody id="tbodyHome">
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('js')
    <script>

    </script>
@stop
