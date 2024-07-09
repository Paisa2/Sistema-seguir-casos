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
            <form action="{{ route('admin.reportes.store') }}">
                @method('POST')
                @csrf
                <div class="row justify-content-center">
                    <div class="col-12 mb-2">
                        <label for="unidad" class="form-label">Seleccionar Unidad</label>
                        <select name="unidad" id="unidad" class="form-control" value="">
                            <option value="">-- Selecciona la Unidad--</option>
                            @foreach ($unidades as $unidad)
                            <option value="{{ $unidad->id }}" @if(old('')=='Preliminar' ) selected @endif>{{ $unidad->nombre }}</option>
                            @endforeach
                            <option value="Todos" @if(old('')=='Todos' ) selected @endif>Todos</option>
                        </select>
                    </div>

                    <div class="col-12 mb-2">
                        <label for="etapa_caso" class="form-label">Seleccionar Proceso</label>
                        <select name="etapa_caso" id="etapa_caso" class="form-control" value="">
                            <option value="">-- Selecciona el Reporte--</option>
                            <option value="Premilinar" @if(old('')=='Preliminar' ) selected @endif>Proceso Preliminar</option>
                            <option value="EtapaPreparatoria" @if(old('')=='Preparatoria' ) selected @endif>Proceso Preparatoria</option>
                            <option value="JucioOral" @if(old('')=='JuicioOral' ) selected @endif>Proceso Juicio Oral</option>
                            <option value="Todos" @if(old('')=='Todos' ) selected @endif>Todos</option>
                        </select>
                    </div>

                    <div class="col-12 mb-2">
                        <label for="fecha_inicio" class="form-label">Fecha Inicial</label>
                        <input name="fecha_inicio" type="date" id="fechaReserva" class="form-control" placeholder="Dia Reserva" value="{{ old('fecha_inicio') }}" onkeypress="return blckSpecialChar(event)">
                        @if ($errors->has('fecha_inicio'))
                        <span class="error text-danger" for="input-fecha_inicio" style="font-size: 15px">{{ $errors->first('fecha_inicio')}}</span>
                        @endif
                    </div>

                    <div class="col-12 mb-2 ">
                        <label for="fecha_fin" class="form-label">Fecha Final</label>
                        <input name="fecha_fin" type="date" id="fechaReserva" class="form-control" placeholder="Dia Reserva" value="{{ old('fecha_fin') }}" onkeypress="return blckSpecialChar(event)">
                        @if ($errors->has('fecha_fin'))
                        <span class="error text-danger" for="input-fecha_fin" style="font-size: 15px">{{ $errors->first('fecha_fin')}}</span>
                        @endif
                    </div>
                    <div class="col-12 mb-2">
                        <button type="submit" class="btn btn-dark" style="background-color: #e32231; padding-top: 0.8%" href="#">
                            Exportar Reporte por PDF
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection