<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartamentoCreateRequest;
use App\Http\Requests\DepartamentoEditequest;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DepartementoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // abort_if(Gate::denies('departamento_index'), 403);
        $departamentos = Departamento::orderBy('id', 'asc')->get();
        // dd($departamentos);
        return view('admin.departamentos.index', compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // abort_if(Gate::denies('departemento_create'), 403);
        $departamentos = Departamento::all();
        return view('admin.departamentos.create', compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartamentoCreateRequest $request)
    {
        $departamento = Departamento::create($request->only('nombre', 'direccion'));

        return redirect()->route('admin.departamentos.index', $departamento->id)->with('success', 'Departamento creado correctamente');
    }

    public function delete($departamentoId)
    {
        $departamento = Departamento::find($departamentoId);
        $departamento->delete();
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
    public function update(DepartamentoEditequest $request, Departamento $departamento)
    {
        $data = $request->only('nombre', 'direccion');

        $departamento->update($data);

        return redirect()->route('admin.departamentos.index', $departamento->id)->with('Departamento actulizado correctaamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamento $departamento)
    {
        // abort_if(Gate::denies('departamento_destroy'), 403);

        $departamento->delete();
        return back()->with('success', 'Departamento eliminado correctamente');
    }
}
