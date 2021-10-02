@extends('layouts.app')
@section('headtext', 'Materias')
@section('title', 'Materias')


@section('content')
    <div class="card mt-3">
        <div class="card-header">
            <a href="{{ route('materias.create') }}" class="btn btn-primary float-right float-end">Agregar materia</a>
        </div>
        <div class="card-body">
            <table class="table table-borderless table-responsive card-1 p-4">
                <thead>
                    <tr class="border-bottom">
                        <th> <span class="ml-2">ID</span> </th>
                        <th> <span class="ml-2">Nombre</span> </th>
                        <th> <span class="ml-2">Acciones</span> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materias as $materia)
                        <tr class="border-bottom">
                            <td>
                                <div class="p-2">
                                    <span class="d-block font-weight-bold">{{ $materia->mat_id }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="p-2 d-flex flex-row align-items-center mb-2">
                                    <span>{{ $materia->mat_nombre }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="p-2 icons">
                                    <a href="{{ route('materias.edit', $materia->mat_id) }}">
                                        <i class="far fa-edit text-info mr-4"></i>
                                    </a>

                                    <a href="{{ route('materias.destroy', $materia->mat_id) }}" style="cursor: pointer;"
                                        class="eliminarRegistro">
                                        <i class="fas fa-trash text-danger"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('js')
    <script>

    </script>
@stop
