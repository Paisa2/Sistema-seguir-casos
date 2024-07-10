@extends('layouts.dashboard.index', ['activePage' => 'users', 'titlePage' => 'Usuarios'])
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css">
@endsection
@section('main-content')

<div class="d-flex justify-content-between">
    <h2>
        INFORMACIÓN DE USUARIOS
    </h2>
    @can('user_create')
    <a type="button" class="btn btn-dark" style="background-color: #1D3354; padding-top: 0.8%" href="{{ route('admin.usuarios.create')}}">
        Nuevo usuario
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
    <!-- Tabla de los Usuarios -->
            <div class="card">
                <div class="card-body">
                    <div style="margin-top: 0%" class="table-responsive" >
                        <table class="table" id="usuarios" >
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Responsable</th>
                                    <th scope="col">Correo Electronico</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Rol</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr scope="row">
                                    <td>{{ @$user->id}}</td>
                                    <td>{{ @$user->name }}</td>
                                    <td>{{ @$user->apellido }}</td>
                                    <td>{{ @$user-> cargo }}</td>
                                    <td>{{ @$user->email }}</td>
                                    <td>{{ @$user->estadoCuenta }}</td>
                                    <td>
                                        @forelse ($user->roles as $role)
                                        <span class="badge badge-info">{{ $role->name }}</span>
                                        @empty
                                        <span class="badge badge-danger">No roles</span>
                                        @endforelse
                                    </td>

                                    <td>
                                        @can('user_edit')
                                        <a type="button" class="btn btn-primary" href="{{ route('admin.usuarios.edit', $user->id) }}">
                                            Editar
                                        </a>
                                        @endcan
                                        @can('user_destroy')
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar-{{$user->id}}">
                                            Eliminar
                                        </button>
                                        @endcan
                                    </td>
                                </tr>
                                @include('admin.usuarios.modalEliminar')
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
    <!-- alert sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('#usuarios').DataTable({
            responsive: true,
            autoWidt: false,
            "language" : {
                "info" : "Mostrando la pagina _PAGE_ de _PAGES_",
                "infoEmpty" : "No records available",
                "infoFiltered" : "(filtrado de _MAX_ registros totales)",
                "lengthMenu" : "Mostrar " +
                                `<select>
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
