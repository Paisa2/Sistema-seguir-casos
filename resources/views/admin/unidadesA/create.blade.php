
@extends('layouts.dashboard.index', ['activePage' => 'nueva solicitud', 'titlePage' => 'Nueva solicitud'])
@section('main-content')

<div class="container">
        <div class="my-6">
            <div class="card">
                <div class="card-header">
                    <h1> Registrar Caso de Denuncia Adulto Mayor</h1>
                </div>
                <div style="margin-top: 1%; display: flex; justify-content: center;">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Por favor corrige los siguentes errores:</strong>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                        </div>
                    @endif

            <div class="card-body">
                <form action="#" method="POST">
                    @csrf
                        <div class="card-bady">
                            {{-- @if($errors->any())
                                <div class="alert alert-primary">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif--}}
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name" class="form-control-label">
                                            Numero de casos:
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group">
                                                <input type="text">
                                            </span>
                                        </div>
                                    </div>
                                </div>


                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="name" class="form-control-label">
                                                        Demandado:
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group">
                                                            <input type="text">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="name" class="form-control-label">
                                                        Demandante:
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group">
                                                            <input type="text">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="" class="form-control-label">
                                                        Tipologia:
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group">
                                                            <input type="text">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="" class="col-sm-2 col-form-label">Responsable del Caso</label>
                                            <div class="col-sm-7">
                                                <select name="cargo" id="cargo" class="form-control" value="{{old('cargo')}}" required>
                                                <option value="">-- Selecciona el responsable--</option>
                                                <option value="">Trabajador Social</option>
                                                <option value="">Psicologo</option>
                                                <option value="">Abogado</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">
                                                    Descripcion del caso:
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group">
                                                    {{-- <input name="motivo" type="text" class="form-control" aria-label="With textarea"> --}}
                                                    <textarea name="motivo" type="text" class="form-control" id=""  placeholder="Descripcion" required>{{old('motivo')}}</textarea>
                                                    </span>
                                                    <br>
                                                    @if ($errors->has('motivo'))
                                                        <span class="error text-danger" for="input-motivo" style="font-size: 15px">{{ $errors->first('motivo') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="" class="col-sm-2 col-form-label">Etapas del Proceso</label>
                                            <div class="col-sm-7">
                                                <select name="cargo" id="cargo" class="form-control" value="{{old('cargo')}}" required>
                                                <option value="">-- Selecciona la Etapa--</option>
                                                <option value="">Preliminar</option>
                                                <option value="">Preparatoria</option>
                                                <option value="">Inicio-Oral</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name" class="form-control-label">
                                                    Fecha de Registro del Caso:
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group">
                                                    <input name="dia" type="date" id="fechaReserva" class="form-control" placeholder="Dia Reserva" value="{{old('dia')}}" required>
                                                    </span>
                                                    <br>
                                                    @if($errors -> has('dia'))
                                                        <span class="error-danger" for="input-name">{{$errors->first('dia')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="" class="form-control-label">
                                                        Subir Achivo de Demanda:
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group">
                                                            <input type="text">
                                                        </span>
                                                    </div>
                                                </div>
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

