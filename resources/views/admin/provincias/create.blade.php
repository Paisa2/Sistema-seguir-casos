@extends('layouts.dashboard.index', ['activePage' => 'provincias', 'titlePage' => 'Nuevo provincia'])
@section('main-content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('admin.provincias.store') }}" method="post" class="form-horizontal">
                    @csrf
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h3 class="card-title">Provincias</h3>
                            <p class="card-category">Ingresar datos</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="nombre" placeholder="Ingrese su nombre" value="{{ old('nombre') }}" autofocus minlength="3" maxlength="55"
                                    onkeypress="return blockSpecialChar(event)">
                                    @if ($errors->has('nombre'))
                                        <span class="error text-danger" for="input-nombre" style="font-size: 15px">{{ $errors->first('nombre') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label for="direccion" class="col-sm-2 col-form-label">Dereccion</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="direccion" placeholder="Ingrese la direccion" value="{{ old('direccion') }}" autofocus minlength="3" maxlength="55"
                                    onkeypress="return blockSpecialChar(event)">
                                    @if ($errors->has('direccion'))
                                        <span class="error text-danger" for="input-direcciom" style="font-size: 15px">{{ $errors->first('direccion') }}</span>
                                    @endif
                                </div>
                            </div>
                                </div>
                                    <!-- Boton de formulario -->
                                    <div class="card-footer ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary">Registrar</button>
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
