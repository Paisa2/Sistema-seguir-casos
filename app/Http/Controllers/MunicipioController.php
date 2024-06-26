<?php

namespace App\Http\Controllers;

use App\Http\Requests\MunicipioCreateRequest;
use App\Http\Requests\MunicipioEditRequest;
use App\Models\Municipio;
use Illuminate\Support\Facades\Gate;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // abort_if(Gate::denies(''), 403);
        $municipios = Municipio::orderBy('id', 'asc')->get();
        // dd($municipios);
        return view('admin.municipios.index', compact('municipios'))->with('tipo', 'all');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // abort_if(Gate::denies('municipio_create'),403);
        $municipios = Municipio::all();
        return view('admin.municipios.create', compact('municipios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MunicipioCreateRequest $request)
    {
        $municipio = Municipio::create($request->only('nombre', 'direccion'));

        return redirect()->route('admin.municipios.index', $municipio->id)->with('success', 'Municipio creado correctamente');
    }

    public function delete($municipioId)
    {
        $municipio = Municipio::find($municipioId);
        $municipio->delete();
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
    public function update(MunicipioEditRequest $request, Municipio $municipio)
    {
        $data = $request->only('nombre', 'direccion');

        $municipio->update($data);

        return redirect()->route('admin.municipios.index', $municipio->id)->with('Municipio actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Municipio $municipio)
    {
        abort_if(Gate::denies('user_destroy'), 403);

        $municipio->delete();
        return back()->with('succes', 'Municipio eliminado correctamente');
    }
}
