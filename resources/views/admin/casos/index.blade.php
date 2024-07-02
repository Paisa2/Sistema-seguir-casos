@extends('layouts.dashboard.index', ['activePage' => 'casos', 'titlePage' => 'Casos'])
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css">
@endsection
@section('main-content')

<div class="d-flex justify-content-between">
    <h2>
        INFORMACIÓN DE CASOS
    </h2>

        <button type="button" class="btn btn-dark" style="background-color: #1D3354; padding-top: 0.8%" data-toggle="modal" data-target="#modalCrear" >
            Registrar Casos
        </button>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success" role="success">
                            {{ session('success') }}
                        </div>
                        @endif
                    </div>
            </div>
        <!-- Tabla de los Casos -->
            <div class="card">
                <div class="card-body">
                    <div style="margin-top: 8%" class="table-reponsive">
                        <table class="table" id="casos">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Numero Caso</th>
                                    <th scope="col">Demandado</th>
                                    <th scope="col">Demandante</th>
                                    <th scope="col">Tipologia</th>
                                    <th scope="col">Responsable</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Etapa Procesos</th>
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
                </div>
            </div>
        </div>
    </div>
</div>



@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.js"></script>

    <script>
        $('#casos').DataTable({
            responsive: true,
            autoWidt: false,
            "language" : {
                "info" : "Mostrando la pagina _PAGE_ de _PAGES_",
                "infoEmpty" : "No records available",
                "infoFiltered" : "(filtrado de _MAX_ registros totales)",
                "lengthMenu" : "Mostrar " +
                                `<select >
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="-1">Todos</option>
                                </select>` +
                                " registros por pagina",
                "zeroRecords" : "Nada encontrado - disculpa",
                "search" : 'Buscar:',
                "paginate" : {
                    'next' : 'siguiente',
                    'previous' : 'anterior',
                }
            }
        });
    </script>
@endsection

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
