<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Case Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .content-title {
            width: 100%;
        }

        .left,
        .right {
            display: inline-block;
            
            vertical-align: top;
        }

        .left {
            text-align: left;
            width: 65%;
        }

        .right {
            text-align: right;
            width: 30%;
        }
        .right img {
            width: 100% !important;
        }
    </style>
</head>

<body>
    <div class="content-title">
        <div class="left">
            <h3>Reporte de caso</h3>
            <p><strong>Elaborado por:</strong> {{ Auth::user()->name  }} {{ Auth::user()->apellido  }} el {{date("Y-m-d H:i:s");}}</p>
            <p><strong>Unidad:</strong> {{ @$unidad->nombre ?? 'Todos' }}</p>
            <p><strong>Etapa Caso:</strong> {{ $etapa_caso ?? 'Todos' }}</p>
            <p><strong>Fecha Inicio:</strong> {{ $fecha_inicio ?? 'No seleccionado' }}</p>
            <p><strong>Fecha Fin:</strong> {{ $fecha_fin ?? 'No seleccionado' }}</p>
        </div>
        <div class="right"><img src="{{ $base64Image }}" alt="Logo"></div>
    </div>
    <table>
        <thead>
            <tr>
                <th scope="col"># Caso</th>
                <th scope="col">Demandado</th>
                <th scope="col">Demandante</th>
                <th scope="col">Tipologia</th>
                <th scope="col">Responsable</th>
                <th scope="col">Fecha</th>
                <th scope="col">Etapa</th>
                <th scope="col">Unidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cases as $case)
            <tr>
                <td>{{ $case->numero_caso }}</td>
                <td>{{ $case->denunciado_nombre }}</td>
                <td>{{ $case->denunciante_nombre }}</td>
                <td>{{ $case->tipologia_caso }}</td>
                <td>{{ $case->responsable_caso }}</td>
                <td>{{ $case->fecha_registro }}</td>
                <td>{{ $case->etapa_caso }}</td>
                <td>{{ $case->unidaditem->nombre}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>