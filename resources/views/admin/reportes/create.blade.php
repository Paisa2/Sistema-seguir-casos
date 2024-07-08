
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
        </div>
    </div>
</div>
@endsection
