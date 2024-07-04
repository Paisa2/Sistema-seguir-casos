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
        $casos = Caso::where('unidad', $request->id_unidad)->orderBy('id', 'asc')->get();
        $unidad = Unidad::findOrFail($request->id_unidad);
        return view('admin.casos.index', compact(['casos', 'unidad']));
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
        // dd($request->all());
        /* $validatedData = $request->validate([
            'numero_caso' => 'required',
            'tipologia_caso' => 'required',
            'responsable_caso' => 'required',
            'etapa_caso' => 'required',
            'fecha_registro' => 'required|date',
            'derivar_casos' => 'required',
            //'image' => 'required|file',
            'denunciante_nombre' => 'required',
            'denunciante_apellido' => 'required',
            'denunciante_ci' => 'required',
            'denunciante_sexo' => 'required',
            'denunciante_edad' => 'required|numeric',
            'denunciante_ocupacion' => 'required',
            'denunciante_estado_civil' => 'required',
            'denunciante_telefono' => 'required',
            'denunciado_nombre' => 'required',
            'denunciado_apellido' => 'required',
            'denunciado_ci' => 'required',
            'denunciado_sexo' => 'required',
            'denunciado_edad' => 'required|numeric',
            'denunciado_telefono' => 'required',
            'unidad' => 'required',
        ]); */
        // Handle file upload
        $data_all = $request->all();
        if ($request->hasFile('image')) {
            $data_all['image'] = $request->file('image')->store('uploads', 'public');
        }
        // Save the new case

        Caso::create($data_all);
        return redirect()->route('admin.unidad.casos', ['id_unidad' => $request->unidad])->with('success', 'Case registered successfully!');
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
    public function edit(Request $request)
    {
        $caso = Caso::all();
        // $unidad = Unidad::findOrFail($request->id_unidad);
        // dd($caso);
        return view('admin.casos.edit', compact(['caso']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $casoId)
    {
        abort_if(Gate::denies('casos_edit'), 403);
        $caso = Caso::find($casoId);

        $caso->numero_caso = $request->numero_caso;
        dd($caso);
        $caso->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //abort_if(Gate::denies('user_destroy'), 403);

        $caso = Caso::findOrFail($id);
        $caso->delete();
        return back()->with('succes', 'Caso eliminado correctamente');
    }
}
