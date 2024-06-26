<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProvinciaCreateRequest;
use App\Http\Requests\ProvinciaEditRequest;
use App\Models\Provincia;
use Illuminate\Support\Facades\Gate;

class ProvinciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // abort_if(Gate::denies('provincia_index'), 403);
        $provincias = Provincia::orderBy('id', 'asc')->get();
        // dd($provincias);
        return view('admin.provincias.index', compact('provincias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // abort_if(Gate::denies('provincia_create'), 403);
        $provincias = Provincia::all();
        return view('admin.provincias.create', compact('provincias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProvinciaCreateRequest $request)
    {
        $provincia = Provincia::create($request->only('nombre', 'direccion'));

        return redirect()->route('admin.provincias.index', $provincia->id)->with('success', 'Provincia creado correctamente');
    }

    public function delete($provinciaId)
    {
        $provincia = Provincia::find($provinciaId);
        $provincia->delete();
        return redirect()->back();
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
    public function update(ProvinciaEditRequest $request, Provincia $provincia)
    {
        $data = $request->only('nombre', 'direccion');

        $provincia->update($data);

        return redirect()->route('admin.provincias.index', $provincia->id)->with('Provincia actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provincia $provincia)
    {
        // abort_if(Gate::denies('user_destoy'), 403);

        $provincia->delete();
        return back()->with('success', 'Provincia eliminado correctamente');
    }
}
