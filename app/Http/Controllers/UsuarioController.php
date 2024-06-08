<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('user_index'), 403);
        $users = User::all();
        return view('admin.usuarios.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('user_create'), 403);
        $users = User::all();
        return view('admin.usuarios.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $user = User::create($request->only('name','apellido', 'cargo', 'email', 'password')
        + [
            'estadoCuenta' => 'Habilitado',
        ]);

        $roles = $request->input('roles', []);
        $user ->syncRole($roles);
        return redirect()->route('admin.usuarios.index', $user->id)->with('success', 'Usuario creado correctamenmte');

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
    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), 403);
        $roles = Role::all()->pluck('name', 'id');
        $user->load('roles');
        return view('admin.usuarios.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, User $user)
    {
        $data = $request->only('name', 'apellido', 'email', 'cargo', 'estadoCuenta');
        $password= $request->input('password');
        if($password)
            $data['password'] = $password;

        $user->update($data);

        $roles = $request->input('roles', []);
        $user->syncRoles($roles);
        return redirect()->route('admin.usuarios.index', $user->id)->with('success', 'El Usduario se Actulizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_destroy'), 403);
        if(auth()->user()->id == $user->id) {
            return redirect()->route('admin.usuarios.index');
        }
        $user->delete();
        return back()->with('success', 'Usuario eliminado correctamente');
    }
}
