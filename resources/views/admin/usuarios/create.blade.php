@extends('layouts.dashboard.index', ['activePage' => 'users', 'titlePage' => 'Nuevo usuario'])
@section('main-content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('admin.usuarios.store')}}" method="post" class="form-horizontal">
                        @csrf
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Usuario</h4>
                                <p class="card-category">Ingrasar Datos</p>
                            </div>

                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="name" placeholder="Ingresar Nombre" value="{{ old('name')}}" autofocus minlength="8" maxlength="25">
                                    @if ($errors->has('name'))
                                        <span class="error text-danger" for='input-name' style="font: size 15px;">{{ $errors->first('name')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label for="ci" class="col-sm-2 col-form-label">Carnet Identidad</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="ci" placeholder="Ingresar Carnet Identidad" value="{{ old('ci')}}" autofocus minlength="1" maxlength="7">
                                    @if ($errors->has('ci'))
                                        <span class="error text-danger" for='input-ci' style="font: size 15px;">{{ $errors->first('ci')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label for="email" class="col-sm-2 col-form-label">Correo Electronico</label>
                                <div class="col-sm-7">
                                    <input type="email" class="form-control" name="email" placeholder="Ingresar Correo Electronico" value="{{ old('email')}}" autofocus minlength="1" maxlength="15">
                                    @if ($errors->has('email'))
                                        <span class="error text-danger" for='input-email' style="font: size 15px;">{{ $errors->first('email')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control" name="password" placeholder="Ingresar Contraseña" value="{{ old('password')}}" autofocus minlength="1" maxlength="15">
                                    @if ($errors->has('password'))
                                        <span class="error text-danger" for='input-password' style="font: size 15px;">{{ $errors->first('password')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
