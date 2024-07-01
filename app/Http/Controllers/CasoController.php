<?php

namespace App\Http\Controllers;

use App\Http\Requests\CasoCreateRequest;
use App\Models\Caso;
use App\Models\Unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CasoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // abort_if(Gate::denies('caso_index'), 403);
        $casos = Caso::orderBy('id', 'asc')->get();

        // dd($casos);
        return view('admin.casos.index', compact('casos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $casos = Caso::all();
        $unidad = Unidad::findOrFail($request->id_unidad);
        return view('admin.casos.create', compact(['casos', 'unidad']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CasoCreateRequest $request)
    {
        // Validate the request data
        $validatedData =$request->validate([
            'numero_caso' => 'required|min:1|max:3',
            'tipologia_caso' => 'required|min:1|max:50',
            'responsable_caso' => 'required',
            'etapa_caso' => 'required|min:1|max:50',
            'fecha_registro' => 'required|date',
            'derivar_casos' => 'required|min:1|max:255',
            'image' => 'required|file',
            'denunciante_nombre' => 'required|min:1|max:50',
            'denunciante_apellido' => 'required|min:1|max:50',
            'denunciante_ci' => 'required|min:1|max:7',
            'denunciante_sexo' => 'required|min:1|max:1',
            'denunciante_edad' => 'required|numeric|min:1|max:100',
            'denunciante_ocupacion' => 'required|min:1|max:50',
            'denunciante_estado_civil' => 'required|min:1|max:50',
            'denunciante_telefono' => 'required|min:1|max:8',
            'denunciado_nombre' => 'required|min:1|max:50',
            'denunciado_apellido' => 'required|min:1|max:50',
            'denunciado_ci' => 'required|min:1|max:7',
            'denunciado_sexo' => 'required|min:1|max:1',
            'denunciado_edad' => 'required|numeric|min:1|max:100',
            'denunciado_telefono' => 'required|min:1|max:8',
            'unidad' => 'required',
        ]);

        // Store the case data
        // Add your storing logic here
        // Handle file upload
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('uploads', 'public');
        }
//dd($validatedData);
        // Save the new case
        Caso::create($validatedData);

        return redirect()->route('admin.casos.index')->with('success', 'Case registered successfully!');
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
