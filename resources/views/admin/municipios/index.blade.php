@extends('layouts.dashboard.index', ['activePage' => 'users', 'titlePage' => 'Usuarios'])
@section('main-content')

<div class="d-flex justify-content-between">
    <h2>
        INFORMACION DE MUNICIPIOS
    </h2>

    <a type="button" class="btn btn-dark" style="background-color: #1D3354; padding-top: 0.8%" href="{{route('admin.municipios.create')}}">
        Nuevo municipio
    </a>
</div>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success" munnicipio="success">
                        {{session('success')}}
                    </div>
                    @endif
                </div>
                @can('user_buscar')
                <span class="input-group" style="width: 60%; margin-right:auto; margin-left:auto">
                    <img src="{{asset('images/search.svg')}}" alt="" style="border-radius: 10px; position: relative; width:100%; max-width:30px; right:8px;">
                    <input id="searchTerm" type="text" onkeyup="doSearch()" class="form-control pull-right"  placeholder="Escribe para buscar en la tabla..." />
                </span>
                @endcan
            </div>
            <div style="margin-top: 0%" class="table-responsive">
                <table class="table" id="municipios">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($municipios as $municipio)
                        <tr scope="row">
                            <td>{{ @$municipio->id }}</td>
                            <td>{{ @$municipio->nombre }}</td>
                            <td>{{ @$municipio->direccion }}</td>
                            <td>
                                <!-- @can('user_edit')
                                <a type="button" class="btn btn-primary" href="{{ route('admin.municipios.edit', $municipio->id) }}">
                                    Editar
                                </a>
                                @endcan -->

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar-{{$municipio->id}}">
                                    Eliminar
                                </button>

                            </td>
                            </td>
                        </tr>
                        @include('admin.municipios.modalEliminar')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script language="javascript">
    function doSearch() {
        var tableReg = document.getElementById('municipios');
        var searchText = document.getElementById('searchTerm').value.toLowerCase();
        for (var i = 1; i < tableReg.rows.length; i++) {
            var cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
            var found = false;
            for (var j = 0; j < cellsOfRow.length && !found; j++) {
                var compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1)) {
                    found = true;
                }
            }
            if (found) {
                tableReg.rows[i].style.display = '';
            } else {
                tableReg.rows[i].style.display = 'none';
            }
        }
    }
</script>
@endsection
