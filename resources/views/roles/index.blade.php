@extends('layouts.dashboard.index', ['activePage' => 'roles', 'titlePage' => 'Roles'])
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css">
@endsection
@section('main-content')

<div class="d-flex justify-content-between">
    <h2>
        INFORMACIÓN DE ROLES
    </h2>
    @can('role_create')
    <a href="{{ route('roles.create') }}" type="button" class="btn btn-dark" style="background-color: #1D3354; padding-top: 0.8%">
        Crear Rol
    </a>
    @endcan
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                    <div class="card-body">
                        <!-- Alerta sweetalert -->
                        @if( ($message = session('message')) )
                        <script>
                            Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "{{$message}}",
                            showConfirmButton: false,
                            timer: 1500
                            });
                        </script>
                        @endif
                    </div>
            </div>
    <!--Tabla de Roles-->
    <div class="card">
        <div class="card-body">
            <div style="margin-top: 1%" class="table-responsive" >
                        <table class="table" id="roles" >
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Guard</th>
                                    <th scope="col">Created_at</th>
                                    <th scope="col">Permisos</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($roles as $role)
                                <tr scope="row">
                                    <td>{{ @$role->id }}</td>
                                    <td>{{ @$role->name }}</td>
                                    <td>{{ @$role->guard_name }}</td>
                                    <td class="text-primary">{{ $role->created_at->toFormattedDateString() }}</td>
                                                <td>
                                                @forelse ($role->permissions as $permission)
                                                    <span class="badge badge-info">{{ $permission->name }}</span>
                                                @empty
                                                    <span class="badge badge-danger">No permission added</span>
                                                @endforelse
                                                </td>
                                    <td>
                                        @can('role_edit')
                                        <a type="button" class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}" >
                                            Editar
                                        </a>
                                        @endcan
                                        @can('role_destroy')
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar-{{$role->id}}">
                                        Eliminar
                                        </button>
                                        @endcan
                                    </td>
                                </tr>
                                @include('roles.modalEliminar')
                                @empty
                                    No existen roles registrados
                                @endforelse
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
        $('#roles').DataTable({
            responsive: true,
            autoWidt: false,
            "language" : {
                "info" : "Mostrando la pagina _PAGE_ de _PAGES_",
                "infoEmpty" : "No records available",
                "infoFiltered" : "(filtrado de _MAX_ registros totales)",
                "lengthMenu" : "Mostrar " +
                                `<select >
                                    <option value="5">5</option>
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

@endsection
