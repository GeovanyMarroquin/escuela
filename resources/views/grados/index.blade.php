@extends('layouts.app')
@section('headtext', 'Grados')
@section('title', 'Grados')


@section('content')
    <div class="card mt-3">
        <div class="card-header">
            <a href="{{ route('grados.create') }}" class="btn btn-primary float-right float-end">Agregar grado</a>
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
                    @foreach ($grados as $grado)
                        <tr class="border-bottom">
                            <td>
                                <div class="p-2">
                                    <span class="d-block font-weight-bold">{{ $grado->grd_id }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="p-2 d-flex flex-row align-items-center mb-2">
                                    <span>{{ $grado->grd_nombre }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="p-2 icons">
                                    <a href="{{ route('grados.edit', $grado->grd_id) }}">
                                        <i class="far fa-edit text-info mr-4"></i>
                                    </a>

                                    <a href="{{ route('grados.destroy', $grado->grd_id) }}" style="cursor: pointer;"
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
