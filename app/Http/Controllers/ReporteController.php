<?php

namespace App\Http\Controllers;

use App\Models\Caso;
use App\Models\Reporte;
use App\Models\Unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use \PDF;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidad::all();
        return view('admin.reportes.create', compact(['unidades']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function convertImageToBase64($path)
    {
        $imagePath = public_path($path);
        $imageData = file_get_contents($imagePath);
        $base64Image = base64_encode($imageData);
        $mimeType = mime_content_type($imagePath);
        return 'data:' . $mimeType . ';base64,' . $base64Image;
    }
    public function store(Request $request)
    {
        // Retrieve filter inputs
        $unidad = $request->input('unidad');
        $etapa_caso = $request->input('etapa_caso');
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');
        $query = Caso::query(); // Retrieve the cases from your database
        if ($unidad && $unidad != 'Todos') {

            $query->where('unidad', $unidad);
        }

        if ($etapa_caso && $etapa_caso != 'Todos') {
            $query->where('etapa_caso', $etapa_caso);
        }

        if ($fecha_inicio && $fecha_fin) {
            $query->whereBetween('fecha_registro', [$fecha_inicio, $fecha_fin]);
        } elseif ($fecha_inicio) {
            $query->where('fecha_registro', '>=', $fecha_inicio);
        } elseif ($fecha_fin) {
            $query->where('fecha_registro', '<=', $fecha_fin);
        }
        $cases = $query->with('unidaditem')->get();
        $unidad = null;
        $base64Image = $this->convertImageToBase64('images/logocolca.jpg');
        if ($unidad && $unidad != 'Todos') {

            $unidad = Unidad::findOrFail($unidad);
        }
        $pdf = PDF::loadView('admin.reportes.pdf_report', compact(['cases','unidad', 'etapa_caso', 'fecha_inicio', 'fecha_fin','base64Image']));

        return $pdf->download('case_report.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
