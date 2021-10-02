@extends('layouts.app')
@section('headtext', 'Alumnos')
@section('title', 'Alumnos')


@section('content')
    <div class="card mt-3">
        <div class="card-header">
            <a href="{{ route('alumnos.create') }}" class="btn btn-primary float-right float-end">Agregar alumnos</a>
        </div>
        <div class="card-body">
            <table class="table table-borderless table-responsive card-1 p-4">
                <thead>
                    <tr class="border-bottom">
                        <th> <span class="ml-2">ID</span> </th>
                        <th> <span class="ml-2">Código</span> </th>
                        <th> <span class="ml-2">Nombre</span> </th>
                        <th> <span class="ml-2">Edad</span> </th>
                        <th> <span class="ml-2">Sexo</span> </th>
                        <th> <span class="ml-2">Grado</span> </th>
                        <th> <span class="ml-2">Acciones</span> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumnos as $alumno)
                        <tr class="border-bottom">
                            <td>
                                <div class="p-2">
                                    <span class="d-block font-weight-bold">{{ $alumno->alm_id }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="p-2 d-flex flex-row align-items-center mb-2">
                                    <span>{{ $alumno->alm_codigo }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="p-2 d-flex flex-row align-items-center mb-2">
                                    <span>{{ $alumno->alm_nombre }}</span>
                                </div>
                            </td>

                            <td>
                                <div class="p-2 d-flex flex-row align-items-center mb-2">
                                    <span>{{ $alumno->alm_edad }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="p-2 d-flex flex-row align-items-center mb-2">
                                    <span>{{ $alumno->alm_sexo == 'M' ? 'Masculino': 'Femenino' }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="p-2 d-flex flex-row align-items-center mb-2">
                                    <span>{{ $alumno->grado[0]->grd_nombre }}</span>
                                </div>
                            </td>

                            <td>
                                <div class="p-2 icons">
                                    <a href="{{ route('alumnos.edit', $alumno->alm_id) }}">
                                        <i class="far fa-edit text-info mr-4"></i>
                                    </a>

                                    <a href="{{ route('alumnos.destroy', $alumno->alm_id) }}" style="cursor: pointer;"
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
