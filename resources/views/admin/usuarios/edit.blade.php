@extends('layouts.dashboard.index', ['activePage' => 'users', 'titlePage' => 'Editar Usuario'])
@section('main-content')
<?php

use Illuminate\Support\Arr;

    $estado = ["Habilitado","Deshabilitado"];
    $estado = array_diff($estado, array("{$user->estadoCuenta}"));
    $estado = Arr::prepend($estado, "{$user->estadoCuenta}");

    $cargo = ['T.Social', 'Psicologo', 'Abogado'];
    $cargo = array_diff($cargo, array("{$user->cargo}"));
    $cargo = Arr::prepend($cargo, "{$user->cargo}");
?>
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
        <form action="{{route('admin.usuarios.update', $user->id)}}" method="post" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-body">
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" autofocus minlength="4" maxlength="20"
                                    onkeypress="return blockSpecialChar(event)">
                                    @if ($errors->has('name'))
                                        <span class="error text-danger" for="input-name" style="font-size: 15px">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label for="apellido" class="col-sm-2 col-form-label">Apellidos</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="apellido" value="{{ old('apellido', $user->apellido) }}" autofocus minlength="4" maxlength="20"
                                            onkeypress="return blockSpecialChar(event)">
                                            @if ($errors->has('apellido'))
                                            <span class="error text-danger" for="input-apellido" style="font-size: 15px">{{ $errors->first('apellido') }}</span>
                                            @endif
                                </div>
                            </div>


                            <div class="row">
                                <label for="email" class="col-sm-2 col-form-label">Correo</label>
                                <div class="col-sm-7">
                                    <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" minlength="10" maxlength="25"  >
                                    @if ($errors->has('email'))
                                        <span class="error text-danger" for="input-email" style="font-size: 15px">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control" name="password" placeholder="Ingrese la contraseña sólo en caso de modificarla" minlength="5" maxlength="15" >
                                    @if ($errors->has('password'))
                                        <span class="error text-danger" for="input-password" style="font-size: 15px">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                    <label for="cargo" class="col-sm-2 col-form-label">Responsable</label>
                                    <div class="col-sm-7">
                                        <select name="cargo" id="cargo" class="form-control" required>
                                            @foreach($cargo as $cargos)
                                            <option value="{{$cargos}}">{{$cargos}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                    <div class="row" >
                                        <label for="estadoCuenta"  class="col-sm-2 col-form-label">Estado de cuenta</label>
                                        <div class="col-sm-7">
                                            <select name="estadoCuenta" id="estadoCuenta" class="form-control"  required>
                                                @foreach($estado as $es)
                                                <option value="{{$es}}">{{$es}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="name" class="col-sm-2 col-form-label">Roles</label>
                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                            <table class="table">
                                                                <tbody>
                                                                    @foreach ($roles as $id => $role)
                                                                    <tr>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <label class="form-check-label" style="margin-bottom: 10%">
                                                                                    <input class="form-check-input" type="checkbox"
                                                                                        name="roles[]"
                                                                                        value="{{ $id }}" {{ $user->roles->contains($id) ? 'checked' : ''}}
                                                                                    >
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check" value=""></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            {{ $role }}
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                            <!-- Boton de Actualizar  -->
                                        <div class="card-footer ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                        </div>
                                </div>
                            </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
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
    let refresh = document.getElementById('refresh');
</script>
@endsection
