@extends('layouts.app')
@section('headtext', 'Materias por grado')
@section('title', 'Materias por grado')


@section('content')
    <div class="card mt-3">
        <div class="card-header">
            <a href="{{ route('materiasxgrado.create') }}" class="btn btn-primary float-right float-end">Agregar materia</a>
        </div>
        <div class="card-body">
            <table class="table table-borderless table-responsive card-1 p-4">
                <thead>
                    <tr class="border-bottom">
                        <th> <span class="ml-2">ID</span> </th>
                        <th> <span class="ml-2">Materia</span> </th>
                        <th> <span class="ml-2">Grado</span> </th>
                        <th> <span class="ml-2">Acciones</span> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materiasxgrado as $mg)
                        <tr class="border-bottom">
                            <td>
                                <div class="p-2">
                                    <span class="d-block font-weight-bold">{{ $mg->mxg_id }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="p-2 d-flex flex-row align-items-center mb-2">
                                    <span>{{ $mg->materias[0]->mat_nombre }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="p-2 d-flex flex-row align-items-center mb-2">
                                    <span>{{ $mg->grados[0]->grd_nombre }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="p-2 icons">
                                    <a href="{{ route('materiasxgrado.edit', $mg->mxg_id) }}">
                                        <i class="far fa-edit text-info mr-4"></i>
                                    </a>

                                    <a href="{{ route('materiasxgrado.destroy', $mg->mxg_id) }}" style="cursor: pointer;"
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
