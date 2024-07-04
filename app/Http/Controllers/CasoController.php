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
        
        $data_all = $request->all();
        if ($request->hasFile('image')) {
            $data_all['image'] = $request->file('image')->store('uploads', 'public');
        }
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
