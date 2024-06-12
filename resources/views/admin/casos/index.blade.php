@extends('layouts.dashboard.index', ['activePage' => 'casos', 'titlePage' => 'Casos'])
@section('main-content')

<div class="d-flex justify-content-between">
    <h2>
        INFORMACIÓN DE CASOS
    </h2>

        <button type="button" class="btn btn-dark" style="background-color: #1D3354; padding-top: 0.8%" data-toggle="modal" data-target="#modalCrear" >
            Registrar Casos
        </button>
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
                    <th scope="col">Responsable</th>
                    <th scope='col'>Tipologia</th>
                    <th scope='col'>Descripcion</th>
                    <th scope='col'>Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($casos as $caso)
                <tr>
                    <td>{{ $caso->id }}</td>
                    <td></td>
                    <td>{{ $caso->tipologia }}</td>
                    <td>{{ $caso->descripcion }}</td>
                    <td>{{ $caso->estado }}</td>
                    <td>
                        <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar-{{$caso->id}}">
                            Editar
                        </a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar-{{$caso->id}}">
                            Eliminar
                        </button>
                    </td>
                </tr>
                @include('admin.casos.modalEliminar')
                @endforeach
            </tbody>
        </table>
    </div>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <div class="modal fade bs-example-modal-lg" id="modalCrear">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modalheader">
                    <h4 class="modal-title w-100 text-center">Nuevo Caso</h4>
                    <button type="button" class="close" data-dimiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.casos.store')}}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tipologia">Tipologia</label>
                            <input type="text" name="tipologia" class="form-control" id="tipologia" value="{{old('tipologia')}}"
                                    required minlength="10" maxlength="55" onkeypress="return blockSpecialChar(event)">
                        </div>

                        <div class="form-group">
                            <label for="tipologia">Descripcion</label>
                            <input type="text-area" name="descripcion" class="form-control" id="descripcion" value="{{old('descripcion')}}"
                                    required minlength="20" maxlength="80" onkeypress="return blockSpecialChar(event)">
                        </div>

                        <div class="form-group">
                            <label for="estado">Estado del Caso</label>
                                <select name="estado" id="estado" class="form-control" required>
                                    <option value="">-- Selecciona el estado--</option>

                                    <option value="Habilitado" @if(old('estado') == 'Habilitado') selected @endif>En curso</option>
                                    <option value="Deshabilitado" @if(old('estado') == 'Deshabilitado') selected @endif>Terminado</option>
                                </select>
                        </div>

                        <div class="form-group">
                            <label for="tipologia">Responsable</label>
                            <input type="text-area" name="descripcion" class="form-control" id="descripcion" value="{{old('descripcion')}}"
                                    required minlength="20" maxlength="80" onkeypress="return blockSpecialChar(event)">
                        </div>

                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" id="refresh">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Aceptar</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script language="javascript">
        function doSearch() {
            var tableReg = document.getElementById('casos');
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

    <script {{-- type="text/javascript" --}}>
            function blockSpecialChar(e){
                var k;
                document.all ? k = e.keyCode : k = e.which;
                return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32);
            }
            function blockNoNumber(e){
                var k;
                document.all ? k = e.keyCode : k = e.which;
                return ( (k >= 48 && k <= 57));
            }

            $(document).ready(function() {
            $(window).load(function() {
                $(".cargando").fadeOut(1000);
            });
        });
        $('.mi_checkbox').click(function() {
                console.log($('.mi_checkbox'));
            //Verifico el estado del checkbox, si esta seleccionado sera igual a 1 de lo contrario sera igual a 0
            var estatus = $(this).prop('checked') == true ? 'Habilitado' : 'Deshabilitado';
            var id = $(this).data('id');
                console.log(estatus);

            $.ajax({
                type: "GET",
                dataType: "json",
                //url: '/StatusNoticia',
                url: "{{ url('/statusnoticia') }}",
                data: {'estatus': estatus, 'id': id},
                success: function(data){
                    $('#resp' + id).html(data.var);
                    console.log(data.var)

                }
            });
        })
    </script>


@endsection
