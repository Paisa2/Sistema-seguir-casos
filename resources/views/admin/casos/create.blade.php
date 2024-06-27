
@extends('layouts.dashboard.index', ['activePage' => 'nueva solicitud', 'titlePage' => 'Nueva solicitud'])
@section('main-content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="#" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h3> Registrar Caso de {{$unidad->nombre}}</h3>
                            <p class="card-category">Ingresar datos Generales del caso Denuncia</p>
                        </div>
                            <div class="card-body">
                                <div class="row">
                                    <label for="" class="col-sm-2 col-form-label">Numero de Caso</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="" placeholder="Ingrese Nª de caso" value="" autofocus minlength="1" maxlength="3">
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="" class="col-sm-2 col-form-label">Tipologia del caso</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="" placeholder="Ingrese la tipologia del caso" value="" autofocus minlength="1" maxlength="50">
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="" class="col-sm-2 col-form-label">Responsable del Caso</label>
                                    <div class="col-sm-7">
                                        <select name="" id="" class="form-control" value="" required>
                                        <option value="">-- Selecciona el Responsable--</option>
                                        <option value="TrabasjadorSocial" @if(old('') == 'TrabasjadorSocial') selected @endif>Trabajador Social</option>
                                        <option value="Psicologo" @if(old('') == 'Psicologo') selected @endif>Psicologo</option>
                                        <option value="Abogado" @if(old('') == 'Abogado') selected @endif>Abogado</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="" class="col-sm-2 col-form-label">Etapa del caso</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="" placeholder="Ingrese la tipologia del caso" value="" autofocus minlength="1" maxlength="50">
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="" class="col-sm-2 col-form-label">Fecha de Registro</label>
                                    <div class="col-sm-7">
                                        <input name="dia" type="date" id="fechaReserva" class="form-control" placeholder="Dia Reserva" value="{{old('dia')}}" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="" class="col-sm-2 col-form-label">Derivar Unidades</label>
                                    <div class="col-sm-7">
                                        <select name="" id="" class="form-control" value="" required>
                                        <option value="">-- Selecciona la Unidad--</option>
                                        <option value="AdultoMayor" @if(old('') == 'AdultoMayor') selected @endif>Adulto-Mayor</option>
                                        <option value="Slim" @if(old('') == 'Slin') selected @endif>Slim</option>
                                        <option value="Defensoria" @if(old('') == 'Defensoria') selected @endif>Defensoria</option>
                                        <option value="Discapacidad" @if(old('') == 'Discapacidad') selected @endif>Discapacidad</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="" class="col-sm-2 col-form-label">Archivos</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="" placeholder="Subir Archivos" value="" autofocus minlength="1" maxlength="50">
                                    </div>
                                </div>
                                <br>
                                <!-- Divider -->
                                <hr class="sidebar-divider my-0">

                                <div class="card-header card-header-primary">
                                    <p class="card-category">Ingresar datos Generales del caso Denunciante</p>
                                </div>

                                <div class="row">
                                    <label for="" class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="" placeholder="Ingrese el nombre" value="" autofocus minlength="1" maxlength="50">
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="" class="col-sm-2 col-form-label">Apellido</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="" placeholder="Ingrese el apellido" value="" autofocus minlength="1" maxlength="50">
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="" class="col-sm-2 col-form-label">CI</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" name="" placeholder="Ingrese el CI" value="" autofocus minlength="1" maxlength="7">
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="" class="col-sm-2 col-form-label">Sexo</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="" placeholder="Ingrese el sexo" value="" autofocus minlength="1" maxlength="1">
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="" class="col-sm-2 col-form-label">Edad</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" name="" placeholder="Ingrese la edad" value="" autofocus minlength="1" maxlength="10">
                                    </div>
                                </div>


                                <div class="row">
                                    <label for="" class="col-sm-2 col-form-label">Ocupacion</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="" placeholder="Ingrese la ocupacion" value="" autofocus minlength="1" maxlength="50">
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="" class="col-sm-2 col-form-label">Estado Civil</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="" placeholder="Ingrese el E. Civil" value="" autofocus minlength="1" maxlength="50">
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="" class="col-sm-2 col-form-label">Telefono</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" name="" placeholder="Ingrese el telefono" value="" autofocus minlength="1" maxlength="8">
                                    </div>
                                </div>
                                <br>
                                <!-- Divider -->
                                <hr class="sidebar-divider my-0">
                                    <div class="card-header card-header-primary">
                                        <p class="card-category">Ingresar datos Generales del caso Denunciado</p>
                                    </div>

                                    <div class="row">
                                    <label for="" class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="" placeholder="Ingrese el nombre" value="" autofocus minlength="1" maxlength="50">
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="" class="col-sm-2 col-form-label">Apellido</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="" placeholder="Ingrese el apellido" value="" autofocus minlength="1" maxlength="50">
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="" class="col-sm-2 col-form-label">CI</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" name="" placeholder="Ingrese el CI" value="" autofocus minlength="1" maxlength="7">
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="" class="col-sm-2 col-form-label">Sexo</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="" placeholder="Ingrese el sexo" value="" autofocus minlength="1" maxlength="1">
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="" class="col-sm-2 col-form-label">Edad</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" name="" placeholder="Ingrese la edad" value="" autofocus minlength="1" maxlength="10">
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="" class="col-sm-2 col-form-label">Telefono</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" name="" placeholder="Ingrese el telefono" value="" autofocus minlength="1" maxlength="8">
                                    </div>
                                </div>

                                    <div class="col-md-offset-4 col-md-10 text-center mt-3">
                                        <button type="submit" class="btn btn-primary">enviar</button>
                                        <a href="{{ URL::previous() }}" class="btn btn-secondary">Cancelar</a>
                                    </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <script>
            var fecha = new Date();
        var anio = fecha.getFullYear();
        var dia = fecha.getDate();
        var _mes = fecha.getMonth(); //viene con valores de 0 al 11
        _mes = _mes + 1; //ahora lo tienes de 1 al 12
        if (_mes < 10) //ahora le agregas un 0 para el formato date
        {
        var mes = "0" + _mes;
        } else {
        var mes = _mes.toString;
        }

        let fecha_minimo = anio + '-' + mes + '-' + dia; // Nueva variable

        document.getElementById("fechaReserva").setAttribute('min',fecha_minimo);
</script>
<script type="text/javascript">

    function blockNoNumber(e){
        var k;
        document.all ? k = e.keyCode : k = e.which;
        return ( (k >= 48 && k <= 57));
        }

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@endsection

