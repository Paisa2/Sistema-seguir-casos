
@extends('layouts.dashboard.index', ['activePage' => 'nueva solicitud', 'titlePage' => 'Nueva solicitud'])
@section('main-content')

<div class="d-flex justify-content-between">
    <h2>
        REPORTES DE LOS CASOS
    </h2>
</div>

<div class="content">
    <div class="container shadow-lg p-3 mb-5 bg-body rounded">
        <div class="card-header card-header-primary">
            <div class="col-sm-3">
                    <label for="etapa_caso" class="form-label">Seleccionar Unidad</label>
                    <select name="etapa_caso" id="etapa_caso" class="form-control" value="" >
                        <option value="">-- Selecciona el Reporte--</option>
                        <option value="UnidadAdultoMayor" @if(old('')=='UnidaAdultoMayor' ) selected @endif>Unidad Adulto Mayor</option>
                        <option value="UnidadDiscapacidad" @if(old('')=='UnidadDiscapacidad' ) selected @endif>Unidad Discapacidad</option>
                        <option value="UnidadDefensoria" @if(old('')=='UnidadDefensoria' ) selected @endif>Unidad Defensoria</option>
                        <option value="UnidadSlim" @if(old('')=='UnidadSlim' ) selected @endif>Unidad Slim</option>
                        <option value="Todos" @if(old('')=='Todos' ) selected @endif>Todos</option>
                    </select>
            </div>

            <div class="col-sm-3">
                    <label for="etapa_caso" class="form-label">Seleccionar Proceso</label>
                    <select name="etapa_caso" id="etapa_caso" class="form-control" value="" >
                        <option value="">-- Selecciona el Reporte--</option>
                        <option value="Preliminar" @if(old('')=='Preliminar' ) selected @endif>Proceso Preliminar</option>
                        <option value="Preparatoria" @if(old('')=='Preparatoria' ) selected @endif>Proceso Preparatoria</option>
                        <option value="JuicioOral" @if(old('')=='JuicioOral' ) selected @endif>Proceso Juicio Oral</option>
                        <option value="Todos" @if(old('')=='Todos' ) selected @endif>Todos</option>
                    </select>
            </div>

            <div class="col-sm-3">
                <label for="fecha_registro" class="form-label">Fecha Inicial</label>
                <input name="fecha_registro" type="date" id="fechaReserva" class="form-control" placeholder="Dia Reserva" value="{{ old('fecha_registro') }}"
                onkeypress="return blckSpecialChar(event)">
                @if ($errors->has('fecha_registro'))
                    <span class="error text-danger" for="input-fecha_registro" style="font-size: 15px">{{ $errors->first('fecha_registro')}}</span>
                @endif
            </div>

            <div class="col-sm-3">
                <label for="fecha_registro" class="form-label">Fecha Final</label>
                <input name="fecha_registro" type="date" id="fechaReserva" class="form-control" placeholder="Dia Reserva" value="{{ old('fecha_registro') }}"
                onkeypress="return blckSpecialChar(event)">
                @if ($errors->has('fecha_registro'))
                    <span class="error text-danger" for="input-fecha_registro" style="font-size: 15px">{{ $errors->first('fecha_registro')}}</span>
                @endif
            </div>
                <br>
            <div class="d-flex justify-content-between">
                <a type="button" class="btn btn-dark" style="background-color: #e32231; padding-top: 0.8%" href="#">
                    Exportar Reporte por PDF
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
