@extends('layouts.dashboard.index', ['activePage' => 'casos', 'titlePage' => 'Casos'])
@section('main-content')

<div class="d-flex justify-content-between">
    <h2>
        INFORMACIÓN DE CASOS
    </h2>

        <a type="button" class="btn btn-dark" style="background-color: #1D3354; padding-top: 0.8%" href="#">
            Registrar Casos
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

    <div style="margin-top: 8%" class="table-reponsive">
        <table class="table" id="casos">
            <thead>
                <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>Tipologia</th>
                    <th scope='col'>Descripcion</th>
                    <th scope='col'>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($casos as $caso)
                <tr>
                    <td>{{ $caso->id }}</td>
                    <td>{{ $caso->tipologia }}</td>
                    <td>{{ $caso->descripcion }}</td>
                    <td>{{ $caso->estado }}</td>
                    <td>
                        <a type="button" class="btn btn-primary" href="{{ route('admin.unidades.edit', $unidad->id) }}">
                            Editar
                        </a>

                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar-{{$unidad->id}}">
                            Eliminar
                        </button>
                    </td>
                </tr>
                @include('admin.casos.modalEliminar')
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
