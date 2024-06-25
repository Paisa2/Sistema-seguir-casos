
@extends('layouts.dashboard.index', ['activePage' => 'nueva solicitud', 'titlePage' => 'Nueva solicitud'])
@section('main-content')
<?php
  $hora_ini   = ['1' => '6:45', '2' => '8:15'];
?>
<div class="container">
        <div class="my-6">
            <div class="card">
                <div class="card-header">
                  Nueva Caso de Solicitud
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

<div class="container">
        <div class="my-6">
            <div class="card">
                    <div class="card-header">

                    </div>

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

                                {{--
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">
                                                Grupo:
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group">

                                                    {{-- <input name="grupo_id" type="name" class="form-control" placeholder="Grupo">
                                                    <select name="grupo" id="grupo" class="custom-select" >
                                                        <option selected>Seleccione N° grupo..</option>

                                                            <option value=""></option>

                                                    </select>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    --}}



                                    <div class="col-6">
                                            <div class="form-group">
                                                <label for="name" class="form-control-label">
                                                    Horario Ini:
                                            </label>
                                                <div class="input-group">
                                                    <span class="input-group">

                                                    {{-- <input type="date" id="birthday" name="hora_ini" type="date" class="form-control"> --}}
                                                    <select class="form-select @error('hora_ini') is-invalid @enderror" id="hora_ini" name="hora_ini">
                                                    </span>
                                                        <option value="" >-- Selecciona la hora para la denuncia--</option>
                                                                @foreach(range(06, 23) as $hora)
                                                                <option value="6:45:00" @if(old('hora_fin') == '6:45:00') selected @endif>6:45:00</option>
                                                                <option value="8:15:00" @if(old('hora_fin') == '8:15:00') selected @endif>8:15:00</option>
                                                                <option value="9:45:00" @if(old('hora_fin') == '9:45:00') selected @endif>9:45:00</option>
                                                                <option value="11:15:00" @if(old('hora_fin') == '11:15:00') selected @endif>11:15:00</option>
                                                                <option value="12:45:00" @if(old('hora_fin') == '12:45:00') selected @endif>12:45:00</option>
                                                                <option value="14:15:00" @if(old('hora_fin') == '14:15:00') selected @endif>14:15:00</option>
                                                                <option value="15:45:00" @if(old('hora_fin') == '15:45:00') selected @endif>15:45:00</option>
                                                                <option value="17:15:00" @if(old('hora_fin') == '17:15:00') selected @endif>17:15:00</option>
                                                                <option value="18:45:00" @if(old('hora_fin') == '18:45:00') selected @endif>18:45:00</option>
                                                                <option value="20:15:00" @if(old('hora_fin') == '20:15:00') selected @endif>20:15:00</option>
                                                                <option value="21:45:00" @if(old('hora_fin') == '21:45:00') selected @endif>21:45:00</option>
                                                                @endforeach
                                                            </select>
                                                            @error('hora_fin')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </select>
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


                                    <div class="col-6">
                                            <div class="form-group">
                                                <label for="name" class="form-control-label">
                                                    Horario Ini:
                                            </label>
                                                <div class="input-group">
                                                    <span class="input-group">

                                                    {{-- <input type="date" id="birthday" name="hora_ini" type="date" class="form-control"> --}}
                                                    <select class="form-select @error('hora_ini') is-invalid @enderror" id="hora_ini" name="hora_ini">
                                                    </span>
                                                        <option value="" >-- Selecciona la hora de la denuncia--</option>
                                                                @foreach(range(06, 23) as $hora)
                                                                <option value="6:45:00" @if(old('hora_fin') == '6:45:00') selected @endif>6:45:00</option>
                                                                <option value="8:15:00" @if(old('hora_fin') == '8:15:00') selected @endif>8:15:00</option>
                                                                <option value="9:45:00" @if(old('hora_fin') == '9:45:00') selected @endif>9:45:00</option>
                                                                <option value="11:15:00" @if(old('hora_fin') == '11:15:00') selected @endif>11:15:00</option>
                                                                <option value="12:45:00" @if(old('hora_fin') == '12:45:00') selected @endif>12:45:00</option>
                                                                <option value="14:15:00" @if(old('hora_fin') == '14:15:00') selected @endif>14:15:00</option>
                                                                <option value="15:45:00" @if(old('hora_fin') == '15:45:00') selected @endif>15:45:00</option>
                                                                <option value="17:15:00" @if(old('hora_fin') == '17:15:00') selected @endif>17:15:00</option>
                                                                <option value="18:45:00" @if(old('hora_fin') == '18:45:00') selected @endif>18:45:00</option>
                                                                <option value="20:15:00" @if(old('hora_fin') == '20:15:00') selected @endif>20:15:00</option>
                                                                <option value="21:45:00" @if(old('hora_fin') == '21:45:00') selected @endif>21:45:00</option>
                                                                @endforeach
                                                            </select>
                                                            @error('hora_fin')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </select>
                                                </div>
                                            </div>
                                        </div>



                                    <div class="col-6">
                                            <div class="form-group">
                                                <label for="name" class="form-control-label">
                                                        Responsable del Caso:
                                                </label>
                                                    <div class="input-group">
                                                <span class="input-group">

                                                    {{-- <input name="ambiente" type="name" class="form-control" placeholder="Ambiente"> --}}
                                                    <select name="ambiente" id="ambiente" class="custom-select" value="{{old('ambiente')}}" required >
                                                        <option value="{{old('ambiente')}}" selected  >Seleccione al Responsable... {{old('ambiente')}}</option>
                                                    {{--  @foreach ($ambientes as $item)
                                                            <option value="{{ $item->id }}">{{ $item->num_ambiente}}</option>
                                                        @endforeach--}}
                                                    </select>
                                                </span>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="col-6">
                                            <div class="form-group">
                                                <label for="name" class="form-control-label">
                                                    Fecha Registro:
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

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name" class="form-control-label">
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

@section('script')
<script >
    $(document).ready(function(){
        $('#docmateria_id').on('change', function(){
            var docmateria_id = $(this).val();
            if($.trim(docmateria_id) != ''){
                $.get('/cantidades', {docmateria_id: docmateria_id}, function(cantidades){
                    $('#cantidad').empty();
                        $('#cantidad').attr("value", cantidades.inscritos);
                        $('#cantidad').empty();
                });
            }
        })
    })
    $(document).ready(function(){
        $('#ubicacion').on('change', function(){
            var ubicacion_id = $(this).val();
            if($.trim(ubicacion_id) != ''){

                $.get('/ubicacionesambientes', {ubicacion_id: ubicacion_id}, function(ambientes){

                  //  alert(ambientes);
                    if( ambientes.length == 1){
                    $('#ambiente').empty();
                        $('#ambiente').append("<option value='' disabled >No hay ambientes disponibles</option>");
                        console.log('hola2');
                        console.log(ambientes);

                    }else{
                        $('#ambiente').empty();
                        $('#ambiente').append("<option value='{{old('ambiente')}}' >Selecciona un ambiente</option>");
                        $.each(ambientes, function(index, value){
                        $('#ambiente').append("<option value='"+ index +"' >"+ value + "</option>")
                        })
                        console.log('hola1');
                    }
                });
            }
        })
    })
</script>

<script>
    $(document).ready(function() {
        $('#hora_ini').select2({
            placeholder: 'Selecciona hasta 4 horas de inicio',
            allowClear: true,
            maximumSelectionLength: 3
        });

        $('#hora_fin').select2({
            placeholder: 'Selecciona una hora de fin',
            allowClear: true
        });
    });
</script>

@endsection
