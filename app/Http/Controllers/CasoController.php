<?php

namespace App\Http\Controllers;

use App\Http\Requests\CasoCreateRequest;
use App\Models\Caso;
use App\Models\Unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

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
        return redirect()->route('admin.unidad.casos', ['id_unidad' => $request->unidad])->with('message', 'Caso registrado correctamente!');
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
        $caso = Caso::findOrFail($request->id);
        $unidad = Unidad::findOrFail($request->id_unidad);
        return view('admin.casos.edit', compact(['caso', 'unidad']))->with('message', 'El caso se actualizo correctamente!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {  
        $data_all = $request->all();
        if ($request->hasFile('image')) {
            $caso = Caso::find($request->casoId);
            if ($caso->image) {
                Storage::disk('public')->delete($caso->image);
            }
            $data_all['image'] = $request->file('image')->store('uploads', 'public');
        }
        $caso = Caso::find($request->casoId);
        $data_all['unidad'] = $request->id_unidad;
        $caso->update($data_all);

        return redirect()->route('admin.unidad.casos', ['id_unidad' => $request->id_unidad])->with('message', 'Caso Actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $caso = Caso::findOrFail($id);
        $caso->delete();
        return back()->with('message', 'El caso eliminado correctamente');
    }
}
