@extends('layouts.dashboard.index', ['activePage' => 'unidades', 'titlePage' => 'Unidades'])
@section('main-content')

<div class="d-flex justify-content-between">
    <h2>
        INFORMACIÓN DE UNIDADES
    </h2>

        <a type="button" class="btn btn-dark" style="background-color: #1D3354; padding-top: 0.8%" href="{{route('admin.unidades.create')}}">
            Crear Unidades
        </a>
</div>

    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>

    <div class="form-group" >
        @can('user_buscar')
        <span class="input-group" style="width: 60%; margin-right:auto; margin-left:auto">
            <img src="{{asset('images/search.svg')}}" alt="" style="border-radius: 10px; position: relative; width:100%; max-width:30px; right:8px;">
            <input id="searchTerm" type="text" onkeyup="doSearch()" class="form-control pull-right"  placeholder="Escribe para buscar en la tabla..." />
        </span>
        @endcan
    </div>

    <div style="margin-top: 8%" class="table-responsive" >
        <table class="table" id="unidades">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre Unidad</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Responsable</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($unidades as $unidad)
                    <tr scope='row'>
                        <td>{{ @$unidad->id }}</td>
                        <td>{{ @$unidad->nombre }}</td>
                        <td>{{ @$unidad->descripcion}}</td>
                        <td>

                            <a type="button" class="btn btn-primary" href="{{ route('admin.unidades.edit', $unidad->id) }}">
                                Editar
                            </a>

                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar-{{$unidad->id}}">
                                Eliminar
                            </button>

                        </td>
                    </tr>
                    @include('admin.unidades.modalEliminar')
                @endforeach
            </tbody>
        </table>
    </div>


@endsection
