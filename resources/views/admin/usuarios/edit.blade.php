@extends('layouts.dashboard.index', ['activePage' => 'users', 'titlePage' => 'Nuevo usuario'])
@section('main-content')

<?php

use Illuminate\Support\Arr;

    $estado = ["Habilitado","Deshabilitado"];
    $estado = array_diff($estado, array("{$user->estadoCuenta}"));
    $estado = Arr::prepend($estado, "{$user->estadoCuenta}");
?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('admin.usuarios.update', $user->id) }}" method="post" class="form-horizontal">
                        @csrf
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Usuario</h4>
                                <p class="card-category">Editar Datos</p>
                            </div>

                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="name" placeholder="Ingresar Nombre" value="{{ old('name')}}" autofocus minlength="1" maxlength="25">
                                    @if ($errors->has('name'))
                                        <span class="error text-danger" for='input-name' style="font: size 15px;">{{ $errors->first('name')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label for="apellido" class="col-sm-2 col-form-label">Apellido</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="apellido" placeholder="Ingresar Apellido" value="{{ old('apellido')}}" autofocus minlength="1" maxlength="25">
                                    @if ($errors->has('name'))
                                        <span class="error text-danger" for='input-name' style="font: size 15px;">{{ $errors->first('name')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label for="cargo" class="col-sm-2 col-form-label">Cargo</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="cargo" placeholder="Ingresar Cargo" value="{{ old('cargo')}}" autofocus minlength="1" maxlength="25">
                                    @if ($errors->has('cargo'))
                                        <span class="error text-danger" for='input-cargo' style="font: size 15px;">{{ $errors->first('cargo')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label for="email" class="col-sm-2 col-form-label">Correo Electronico</label>
                                <div class="col-sm-7">
                                    <input type="email" class="form-control" name="email" autocomplete="current-email" placeholder="Ingresar Correo Electronico" value="{{ old('email')}}" autofocus minlength="1" maxlength="15">
                                    @if ($errors->has('email'))
                                        <span class="error text-danger" for='input-email' style="font: size 15px;">{{ $errors->first('email')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control" name="password" autocomplete="current-password" placeholder="Ingresar Contraseña" value="{{ old('password')}}" autofocus minlength="1" maxlength="15">
                                    @if ($errors->has('password'))
                                        <span class="error text-danger" for='input-password' style="font: size 15px;">{{ $errors->first('password')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label for="estadoCuenta" class="col-sm-2 col-form-label">Estado de Cuenta</label>
                                <div class="col-sm-7">
                                    <select name="estadoCuenta" id="estadoCuenta" class="form-control" required>
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



                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
