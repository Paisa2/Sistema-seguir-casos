@extends('layouts.dashboard.index', ['activePage' => 'nueva solicitud', 'titlePage' => 'Nueva solicitud'])

@section('main-content')
<div class="container shadow-lg p-3 mb-5 bg-body rounded">
    <div class="card-header card-header-primary">
        <h3> Registrar Caso de {{$unidad->nombre}}</h3>
        <p class="card-category">Ingresar datos Generales del caso Denuncia</p>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <br>
        <form class="row g-3" action="{{ route('admin.casos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="unidad" value="{{ $unidad->id }}">

            <div class="col-sm-3">
                <label for="numero_caso" class="form-label">Numero de Caso</label>
                <input type="text" class="form-control" name="numero_caso" placeholder="Ingrese Nª de caso" value="{{ old('numero_caso') }}" autofocus minlength="1" maxlength="3">
            </div>

            <div class="col-sm-3">
                <label for="tipologia_caso" class="form-label">Tipologia del caso</label>
                <input type="text" class="form-control" name="tipologia_caso" placeholder="Ingrese la tipologia" value="{{ old('tipologia_caso') }}" autofocus minlength="1" maxlength="50">
            </div>

            <div class="col-sm-4">
                <label for="responsable_caso" class="form-label">Responsable Caso</label>
                <select name="responsable_caso" id="responsable_caso" class="form-control" required>
                    <option value="">-- Selecciona el Responsable--</option>
                    <option value="TrabajadorSocial" @if(old('responsable_caso')=='TrabajadorSocial' ) selected @endif>Trabajador Social</option>
                    <option value="Psicologo" @if(old('responsable_caso')=='Psicologo' ) selected @endif>Psicologo</option>
                    <option value="Abogado" @if(old('responsable_caso')=='Abogado' ) selected @endif>Abogado</option>
                </select>
            </div>

            <div class="col-sm-3">
                <label for="etapa_caso" class="form-label">Etapa del caso</label>
                <select name="" id="" class="form-control" value="" required>
                        <option value="">-- Selecciona el Etapa--</option>
                        <option value="Premilinar" @if(old('') == 'Premilinar') selected @endif>Premilinar</option>
                        <option value="EtapaPreparatoria" @if(old('') == 'EtapaPreparatoria') selected @endif>Etapa-Preparatoria</option>
                        <option value="JucioOral" @if(old('') == 'JucioOral') selected @endif>Jucio-Oral</option>
                </select>
            </div>

            <div class="col-sm-3">
                <label for="fecha_registro" class="form-label">Fecha de Registro</label>
                <input name="fecha_registro" type="date" id="fechaReserva" class="form-control" placeholder="Dia Reserva" value="{{ old('fecha_registro') }}" required>
            </div>

            <div class="col-sm-4">
                <label for="derivar_casos" class="form-label">Derivar Casos</label>
                <input type="text" class="form-control" name="derivar_casos" placeholder="Ingrese la derivacion" value="{{ old('derivar_casos') }}" autofocus minlength="1" maxlength="50">
            </div>

            <div class="col-sm-6">
                <label for="image" class="form-label">Archivos</label>
                <input type="file" class="form-control" name="image" placeholder="Subir Archivos" value="{{ old('image') }}" autofocus minlength="1" maxlength="50">
            </div>
            <br>

            <p class="card-category">Ingresar datos Generales del caso Denunciante</p>
            <hr class="sidebar-divider my-0">
            <br>
            <div class="col-sm-3">
                <label for="denunciante_nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="denunciante_nombre" placeholder="Ingrese el nombre" value="{{ old('denunciante_nombre') }}" autofocus minlength="1" maxlength="50">
            </div>

            <div class="col-sm-3">
                <label for="denunciante_apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="denunciante_apellido" placeholder="Ingrese el apellido" value="{{ old('denunciante_apellido') }}" autofocus minlength="1" maxlength="50">
            </div>

            <div class="col-sm-3">
                <label for="denunciante_ci" class="form-label">CI</label>
                <input type="number" class="form-control" name="denunciante_ci" placeholder="Ingrese el CI" value="{{ old('denunciante_ci') }}" autofocus minlength="1" maxlength="7">
            </div>

            <div class="col-sm-3">
                <label for="responsable_caso" class="form-label">Sexo</label>
                <select name="responsable_caso" id="responsable_caso" class="form-control" required>
                    <option value="">--Selecciona el Sexo--</option>
                    <option value="Masculino" @if(old('masculino')=='Masculino' ) selected @endif>Masculino</option>
                    <option value="Femenino" @if(old('femenino')=='Femenino' ) selected @endif>Femenino</option>
                </select>
            </div>

            <div class="col-sm-3">
                <label for="denunciante_edad" class="form-label">Edad</label>
                <input type="number" class="form-control" name="denunciante_edad" placeholder="Ingrese la edad" value="{{ old('denunciante_edad') }}" autofocus minlength="1" maxlength="10">
            </div>

            <div class="col-sm-3">
                <label for="denunciante_ocupacion" class="form-label">Ocupacion</label>
                <input type="text" class="form-control" name="denunciante_ocupacion" placeholder="Ingrese la ocupacion" value="{{ old('denunciante_ocupacion') }}" autofocus minlength="1" maxlength="50">
            </div>

            <div class="col-sm-3">
                <label for="denunciante_estado_civil" class="form-label">Estado Civil</label>
                <input type="text" class="form-control" name="denunciante_estado_civil" placeholder="Ingrese el E. Civil" value="{{ old('denunciante_estado_civil') }}" autofocus minlength="1" maxlength="50">
            </div>

            <div class="col-sm-3">
                <label for="denunciante_telefono" class="form-label">Telefono</label>
                <input type="number" class="form-control" name="denunciante_telefono" placeholder="Ingrese el telefono" value="{{ old('denunciante_telefono') }}" autofocus minlength="1" maxlength="8">
            </div>
            <br>
            <p class="card-category">Ingresar datos Generales del caso Denunciado</p>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <div class="col-sm-3">
                <label for="denunciado_nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="denunciado_nombre" placeholder="Ingrese el nombre" value="{{ old('denunciado_nombre') }}" autofocus minlength="1" maxlength="50">
            </div>

            <div class="col-sm-3">
                <label for="denunciado_apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="denunciado_apellido" placeholder="Ingrese el apellido" value="{{ old('denunciado_apellido') }}" autofocus minlength="1" maxlength="50">
            </div>

            <div class="col-sm-3">
                <label for="denunciado_ci" class="form-label">CI</label>
                <input type="number" class="form-control" name="denunciado_ci" placeholder="Ingrese el CI" value="{{ old('denunciado_ci') }}" autofocus minlength="1" maxlength="7">
            </div>

            <div class="col-sm-3">
                <label for="responsable_caso" class="form-label">Sexo</label>
                <select name="responsable_caso" id="responsable_caso" class="form-control" required>
                    <option value="">--Selecciona el Sexo--</option>
                    <option value="Masculino" @if(old('masculino')=='Masculino' ) selected @endif>Masculino</option>
                    <option value="Femenino" @if(old('femenino')=='Femenino' ) selected @endif>Femenino</option>
                </select>
            </div>

            <div class="col-sm-3">
                <label for="denunciado_edad" class="form-label">Edad</label>
                <input type="number" class="form-control" name="denunciado_edad" placeholder="Ingrese la edad" value="{{ old('denunciado_edad') }}" autofocus minlength="1" maxlength="10">
            </div>

            <div class="col-sm-3">
                <label for="denunciado_telefono" class="form-label">Telefono</label>
                <input type="number" class="form-control" name="denunciado_telefono" placeholder="Ingrese el telefono" value="{{ old('denunciado_telefono') }}" autofocus minlength="1" maxlength="8">
            </div>

            <div class="col-md-offset-4 col-md-10 text-center mt-3">
                <button type="submit" class="btn btn-primary">Registrar</button>
                <a href="{{ URL::previous() }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
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

    document.getElementById("fechaReserva").setAttribute('min', fecha_minimo);
</script>
<script type="text/javascript">
    function blockNoNumber(e) {
        var k;
        document.all ? k = e.keyCode : k = e.which;
        return ((k >= 48 && k <= 57));
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
