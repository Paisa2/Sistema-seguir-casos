
@extends('layouts.dashboard.index', ['activePage' => 'nueva solicitud', 'titlePage' => 'Nueva solicitud'])
@section('main-content')

            <div class="container shadow-lg p-3 mb-5 bg-body rounded">
                <div class="card-header card-header-primary">
                    <h3> Registrar Caso de {{$unidad->nombre}}</h3>
                    <p class="card-category">Ingresar datos Generales del caso Denuncia</p>
                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">
                    <br>
                        <form class="row g-3" action="#" method="POST">
                            @csrf
                                <div class="col-sm-3">
                                    <label for="" class="form-label">Numero de Caso</label>
                                    <input type="text" class="form-control" name="" placeholder="Ingrese Nª de caso" value="" autofocus minlength="1" maxlength="3">
                                </div>

                                <div class="col-sm-3">
                                    <label for="" class="form-label">Tipologia del caso</label>
                                    <input type="text" class="form-control" name="" placeholder="Ingrese la tipologia" value="" autofocus minlength="1" maxlength="50">
                                </div>

                                <div class="col-sm-4">
                                    <label for="" class="form-label">Responsable Caso</label>
                                        <select name="" id="" class="form-control" value="" required>
                                            <option value="">-- Selecciona el Responsable--</option>
                                            <option value="TrabasjadorSocial" @if(old('') == 'TrabasjadorSocial') selected @endif>Trabajador Social</option>
                                            <option value="Psicologo" @if(old('') == 'Psicologo') selected @endif>Psicologo</option>
                                            <option value="Abogado" @if(old('') == 'Abogado') selected @endif>Abogado</option>
                                        </select>
                                </div>

                                <div class="col-sm-3">
                                    <label for="" class="form-label">Etapa del caso</label>
                                        <input type="text" class="form-control" name="" placeholder="Ingrese la Etapa" value="" autofocus minlength="1" maxlength="50">
                                </div>

                                <div class="col-sm-3">
                                    <label for="" class="form-label">Fecha de Registro</label>
                                        <input name="dia" type="date" id="fechaReserva" class="form-control" placeholder="Dia Reserva" value="{{old('dia')}}" required>
                                </div>

                                <div class="col-sm-4">
                                    <label for="" class="form-label">Derivar Casos</label>
                                    <input type="text" class="form-control" name="" placeholder="Ingrese la derivacion" value="" autofocus minlength="1" maxlength="50">
                                </div>

                                <div class="col-sm-6">
                                    <label for="" class="form-label">Archivos</label>
                                        <input type="file" class="form-control" name="image" placeholder="Subir Archivos" value="" autofocus minlength="1" maxlength="50">
                                </div>
                            <br>

                            <p class="card-category">Ingresar datos Generales del caso Denunciante</p>
                            <hr class="sidebar-divider my-0">
                            <br>
                                <div class="col-sm-3">
                                    <label for="" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" name="" placeholder="Ingrese el nombre" value="" autofocus minlength="1" maxlength="50">
                                </div>

                                <div class="col-sm-3">
                                    <label for="" class="form-label">Apellido</label>
                                        <input type="text" class="form-control" name="" placeholder="Ingrese el apellido" value="" autofocus minlength="1" maxlength="50">
                                </div>

                                <div class="col-sm-3">
                                    <label for="" class="form-label">CI</label>
                                        <input type="number" class="form-control" name="" placeholder="Ingrese el CI" value="" autofocus minlength="1" maxlength="7">
                                </div>

                                <div class="col-sm-3">
                                    <label for="" class="form-label">Sexo</label>
                                        <input type="text" class="form-control" name="" placeholder="Ingrese el sexo" value="" autofocus minlength="1" maxlength="1">
                                </div>

                                <div class="col-sm-3">
                                    <label for="" class="form-label">Edad</label>
                                        <input type="number" class="form-control" name="" placeholder="Ingrese la edad" value="" autofocus minlength="1" maxlength="10">
                                </div>

                                <div class="col-sm-4">
                                    <label for="" class="form-label">Ocupacion</label>
                                        <input type="text" class="form-control" name="" placeholder="Ingrese la ocupacion" value="" autofocus minlength="1" maxlength="50">
                                </div>

                                <div class="col-sm-4">
                                    <label for="" class="form-label">Estado Civil</label>
                                        <input type="text" class="form-control" name="" placeholder="Ingrese el E. Civil" value="" autofocus minlength="1" maxlength="50">
                                </div>

                                <div class="col-sm-4">
                                    <label for="" class="form-label">Telefono</label>
                                        <input type="number" class="form-control" name="" placeholder="Ingrese el telefono" value="" autofocus minlength="1" maxlength="8">
                                </div>
                            <br>
                            <p class="card-category">Ingresar datos Generales del caso Denunciado</p>
                            <!-- Divider -->
                            <hr class="sidebar-divider my-0">

                                <div class="col-sm-3">
                                    <label for="" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" name="" placeholder="Ingrese el nombre" value="" autofocus minlength="1" maxlength="50">
                                </div>

                                <div class="col-sm-3">
                                    <label for="" class="form-label">Apellido</label>
                                        <input type="text" class="form-control" name="" placeholder="Ingrese el apellido" value="" autofocus minlength="1" maxlength="50">
                                </div>

                                <div class="col-sm-3">
                                    <label for="" class="form-label">CI</label>
                                        <input type="number" class="form-control" name="" placeholder="Ingrese el CI" value="" autofocus minlength="1" maxlength="7">
                                </div>

                                <div class="col-sm-3">
                                    <label for="" class="form-label">Sexo</label>
                                        <input type="text" class="form-control" name="" placeholder="Ingrese el sexo" value="" autofocus minlength="1" maxlength="1">
                                </div>

                                <div class="col-sm-3">
                                    <label for="" class="form-label">Edad</label>
                                        <input type="number" class="form-control" name="" placeholder="Ingrese la edad" value="" autofocus minlength="1" maxlength="10">
                                </div>

                                <div class="col-sm-3">
                                    <label for="" class="form-label">Telefono</label>
                                        <input type="number" class="form-control" name="" placeholder="Ingrese el telefono" value="" autofocus minlength="1" maxlength="8">
                                </div>

                                <div class="col-md-offset-4 col-md-10 text-center mt-3">
                                        <button type="submit" class="btn btn-primary">Registrar</button>
                                        <a href="{{ URL::previous() }}" class="btn btn-danger">Cancelar</a>
                                </div>
                    </div>
                </form>
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

