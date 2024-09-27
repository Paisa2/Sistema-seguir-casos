@extends('layouts.dashboard.index', ['activePage' => 'nueva solicitud', 'titlePage' => 'Nueva solicitud'])

@section('main-content')
<div class="container shadow-lg p-3 mb-5 bg-body rounded">
    <div class="card-header card-header-primary">
        <h3> Editar Caso de {{$unidad->nombre}}</h3>
        <p class="card-category">Ingresar datos Generales del caso Denuncia</p>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <br>
        <form class="row g-3" action="{{ route('admin.unidad.casos.update', ['id_unidad'=>$unidad->id,'casoId'=>$caso->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="unidad" value="{{ $unidad->id }}">

            <div class="col-sm-2">
                <label for="numero_caso" class="form-label">Numero de Caso</label>
                <input type="text" class="form-control" name="numero_caso" placeholder="Ingrese Nª de caso" value="{{ $caso->numero_caso  }}" autofocus minlength="1" maxlength="3" onkeypress="return blckSpecialChar(event)">
                @if ($errors->has('numero_caso'))
                <span class="error text-danger" for="input-numero_caso" style="font-size: 15px">{{ $errors->first('numero_caso')}}</span>
                @endif
            </div>

            <div class="col-sm-3">
                <label for="tipologia_caso" class="form-label">Tipologia del caso</label>
                <input type="text" class="form-control" name="tipologia_caso" placeholder="Ingrese la tipologia" value="{{ $caso->tipologia_caso  }}" autofocus minlength="1" maxlength="50" onkeypress="return blckSpecialChar(event)">
                @if ($errors->has('tipologia_caso'))
                <span class="error text-danger" for="input-tipologia_caso" style="font-size: 15px">{{ $errors->first('tipologia_caso')}}</span>
                @endif
            </div>

            <div class="col-sm-3">
                <label for="responsable_caso" class="form-label">Responsable Caso</label>
                <select name="responsable_caso" id="responsable_caso" class="form-control" required>
                    <option value="">-- Selecciona el Responsable--</option>
                    <option value="T.Social" @if($caso->responsable_caso == 'T.Social' ) selected @endif>Trabajador Social</option>
                    <option value="Psicologo" @if($caso->responsable_caso == 'Psicologo' ) selected @endif>Psicologo</option>
                    <option value="Abogado" @if($caso->responsable_caso =='Abogado' ) selected @endif>Abogado</option>
                </select>
            </div>

            <div class="col-sm-3">
                {{$caso->etapa_caso}}
                <label for="etapa_caso" class="form-label">Etapa del caso</label>
                <select name="etapa_caso" id="etapa_caso" class="form-control" required>
                    <option value="">-- Selecciona la Etapa--</option>
                    <option value="Premilinar" @if($caso->etapa_caso=='Premilinar' ) selected @endif>Premilinar</option>
                    <option value="Preparatoria" @if($caso->etapa_caso=='Preparatoria' ) selected @endif>Etapa-Preparatoria</option>
                    <option value="J.Oral" @if($caso->etapa_caso=='J.Oral' ) selected @endif>Jucio-Oral</option>
                </select>
            </div>

            <div class="col-sm-2">
                <label for="fecha_registro" class="form-label">Fecha de Registro</label>
                <input name="fecha_registro" type="date" id="fechaReserva" class="form-control" placeholder="Dia Reserva" value="{{ $caso->fecha_registro  }}" required onkeypress="return blckSpecialChar(event)">
                @if ($errors->has('fecha_registro'))
                <span class="error text-danger" for="input-fecha_registro" style="font-size: 15px">{{ $errors->first('fecha_registro')}}</span>
                @endif
            </div>


            <div class="col-sm-5">
                <label for="image" class="form-label">Archivos</label>
                <input type="file" accept="application/pdf,application/msword" class="form-control" name="image" placeholder="Subir Archivos" value="{{ $caso->image  }}" autofocus minlength="1" maxlength="50" onkeypress="return blckSpecialChar(event)">
                @if (@$caso->image)
                <a href="{{ url('/storage/'.$caso->image) }}" target="_blank">Archivo Subido</a>
                @endif
                @if ($errors->has('image'))
                <span class="error text-danger" for="input-image" style="font-size: 15px">{{ $errors->first('image')}}</span>
                @endif
            </div>
            <br>

            <p class="card-category">Ingresar datos Generales del caso Denunciante</p>
            <hr class="sidebar-divider my-0">
            <br>
            <div class="col-sm-3">
                <label for="denunciante_nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="denunciante_nombre" placeholder="Ingrese el nombre" value="{{ $caso->denunciante_nombre  }}" autofocus minlength="1" maxlength="50" onkeypress="return blckSpecialChar(event)">
                @if ($errors->has('denunciante_nombre'))
                <span class="error text-danger" for="input-denunciante_nombre" style="font-size: 15px">{{ $errors->first('denunciante_nombre')}}</span>
                @endif
            </div>

            <div class="col-sm-3">
                <label for="denunciante_apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="denunciante_apellido" placeholder="Ingrese el apellido" value="{{ $caso->denunciante_apellido  }}" autofocus minlength="1" maxlength="50" onkeypress="return blckSpecialChar(event)">
                @if ($errors->has('denunciante_apellido'))
                <span class="error text-danger" for="input-denunciante_apellido" style="font-size: 15px">{{ $errors->first('denunciante_apellido')}}</span>
                @endif
            </div>

            <div class="col-sm-3">
                <label for="denunciante_ci" class="form-label">CI</label>
                <input type="number" class="form-control" name="denunciante_ci" placeholder="Ingrese el CI" value="{{ $caso->denunciante_ci  }}" autofocus minlength="1" maxlength="7" onkeypress="return blckSpecialChar(event)">
                @if ($errors->has('denunciante_ci'))
                <span class="error text-danger" for="input-denunciante_ci" style="font-size: 15px">{{ $errors->first('denunciante_ci')}}</span>
                @endif
            </div>

            <div class="col-sm-3">
                <label for="denunciante_sexo" class="form-label">Sexo</label>
                <select name="denunciante_sexo" id="responsable_caso" class="form-control" required>
                    <option value="">--Selecciona el Sexo--</option>
                    <option value="Masculino" @if($caso->denunciante_sexo =='Masculino' ) selected @endif>Masculino</option>
                    <option value="Femenino" @if($caso->denunciante_sexo =='Femenino' ) selected @endif>Femenino</option>
                </select>
            </div>

            <div class="col-sm-2">
                <label for="denunciante_edad" class="form-label">Edad</label>
                <input type="number" class="form-control" name="denunciante_edad" placeholder="Ingrese la edad" value="{{ $caso->denunciante_edad  }}" autofocus minlength="1" maxlength="10" onkeypress="return blckSpecialChar(event)">
                @if ($errors->has('denunciante_edad'))
                <span class="error text-danger" for="input-denunciante_edad" style="font-size: 15px">{{ $errors->first('denunciante_edad')}}</span>
                @endif
            </div>

            <div class="col-sm-3">
                <label for="denunciante_ocupacion" class="form-label">Ocupacion</label>
                <input type="text" class="form-control" name="denunciante_ocupacion" placeholder="Ingrese la ocupacion" value="{{ $caso->denunciante_ocupacion  }}" autofocus minlength="1" maxlength="50" onkeypress="return blckSpecialChar(event)">
                @if ($errors->has('denunciante_ocupacion'))
                <span class="error text-danger" for="input-denunciante_ocupacion" style="font-size: 15px">{{ $errors->first('denunciante_ocupacion')}}</span>
                @endif
            </div>

            <div class="col-sm-3">
                <label for="denunciante_estado_civil" class="form-label">Estado Civil</label>
                <input type="text" class="form-control" name="denunciante_estado_civil" placeholder="Ingrese el E. Civil" value="{{ $caso->denunciante_estado_civil  }}" autofocus minlength="1" maxlength="50" onkeypress="return blckSpecialChar(event)">
                @if ($errors->has('denunciante_estado_civil'))
                <span class="error text-danger" for="input-denunciante_estado_civil" style="font-size: 15px">{{ $errors->first('denunciante_estado_civil')}}</span>
                @endif
            </div>

            <div class="col-sm-3">
                <label for="denunciante_telefono" class="form-label">Telefono</label>
                <input type="number" class="form-control" name="denunciante_telefono" placeholder="Ingrese el telefono" value="{{ $caso->denunciante_telefono  }}" autofocus minlength="1" maxlength="8" onkeypress="return blckSpecialChar(event)">
                @if ($errors->has('denunciante_telefono'))
                <span class="error text-danger" for="input-denunciante_telefono" style="font-size: 15px">{{ $errors->first('denunciante_telefono')}}</span>
                @endif
            </div>
            <br>
            <p class="card-category">Ingresar datos Generales del caso Denunciado</p>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <div class="col-sm-3">
                <label for="denunciado_nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="denunciado_nombre" placeholder="Ingrese el nombre" value="{{ $caso->denunciado_nombre  }}" autofocus minlength="1" maxlength="50" onkeypress="return blckSpecialChar(event)">
                @if ($errors->has('denunciado_nombre'))
                <span class="error text-danger" for="input-denunciado_nombre" style="font-size: 15px">{{ $errors->first('denunciado_nombre')}}</span>
                @endif
            </div>

            <div class="col-sm-3">
                <label for="denunciado_apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="denunciado_apellido" placeholder="Ingrese el apellido" value="{{ $caso->denunciado_apellido  }}" autofocus minlength="1" maxlength="50" onkeypress="return blckSpecialChar(event)">
                @if ($errors->has('denunciado_apellido'))
                <span class="error text-danger" for="input-denunciado_apellido" style="font-size: 15px">{{ $errors->first('denunciado_apellido')}}</span>
                @endif
            </div>

            <div class="col-sm-3">
                <label for="denunciado_ci" class="form-label">CI</label>
                <input type="number" class="form-control" name="denunciado_ci" placeholder="Ingrese el CI" value="{{ $caso->denunciado_ci  }}" autofocus minlength="1" maxlength="7" onkeypress="return blckSpecialChar(event)">
                @if ($errors->has('denunciado_ci'))
                <span class="error text-danger" for="input-denunciado_ci" style="font-size: 15px">{{ $errors->first('denunciado_ci')}}</span>
                @endif
            </div>

            <div class="col-sm-3">
                <label for="denunciado_sexo" class="form-label">Sexo</label>
                <select name="denunciado_sexo" id="responsable_caso" class="form-control" required>
                    <option value="">--Selecciona el Sexo--</option>
                    <option value="Masculino" @if($caso->denunciado_sexo =='Masculino' ) selected @endif>Masculino</option>
                    <option value="Femenino" @if($caso->denunciado_sexo =='Femenino' ) selected @endif>Femenino</option>
                </select>
            </div>

            <div class="col-sm-2">
                <label for="denunciado_edad" class="form-label">Edad</label>
                <input type="number" class="form-control" name="denunciado_edad" placeholder="Ingrese la edad" value="{{ $caso->denunciado_edad  }}" autofocus minlength="1" maxlength="10" onkeypress="return blckSpecialChar(event)">
                @if ($errors->has('denunciado_edad'))
                <span class="error text-danger" for="input-denunciado_edad" style="font-size: 15px">{{ $errors->first('denunciado_edad')}}</span>
                @endif
            </div>

            <div class="col-sm-3">
                <label for="denunciado_telefono" class="form-label">Telefono</label>
                <input type="number" class="form-control" name="denunciado_telefono" placeholder="Ingrese el telefono" value="{{ $caso->denunciado_telefono  }}" autofocus minlength="1" maxlength="8" onkeypress="return blckSpecialChar(event)">
                @if ($errors->has('denunciado_telefono'))
                <span class="error text-danger" for="input-denunciado_telefono" style="font-size: 15px">{{ $errors->first('denunciado_telefono')}}</span>
                @endif
            </div>

            <div class="col-md-offset-4 col-md-10 text-center mt-3">
                <button type="submit" class="btn btn-primary">Actualizar</button>
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
