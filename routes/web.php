<?php

use App\Http\Controllers\DenunciaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('login.index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/register', [App\Http\Controllers\RegisterController::class, 'store'])
->name('register.store');

Route::get('/register', [App\Http\Controllers\RegisterController::class, 'create'])
->middleware('guest')
->name('register.index');


Route::post('/registerAdmin', [App\Http\Controllers\RegisterAdminController::class, 'store'])
->name('admin.registerAdminStore');

Route::get('/registerAdmin', [App\Http\Controllers\RegisterAdminController::class, 'create'])
->middleware('guest')
->name('admin.registerAdmin');


Route::get('/login', [App\Http\Controllers\SessionsController::class, 'create'])
->middleware('guest')
->name('login.index');

Route::post('/login', [App\Http\Controllers\SessionsController::class, 'store'])
->name('login.store');

Route::get('/logout', [App\Http\Controllers\SessionsController::class, 'destroy'])
->middleware('auth')
->name('login.destroy');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])
->middleware('auth.admin')
->name('admin.index');

Route::get('/usuario', [App\Http\Controllers\UserController::class, 'index'])
->middleware('auth.user')
->name('user.index');

Route::get('/auth', function () {
    return view('index');
})->middleware('auth.user')
->name('auth.user');

//Usuarios
Route::get('/usuarios/index', [App\Http\Controllers\UsuarioController::class, 'index'])
->name('admin.usuarios.index');

Route::get('/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])
->name('admin.usuarios.create');

Route::post('/usuarios/store', [App\Http\Controllers\UsuarioController::class, 'store'])
->name('admin.usuarios.store');

Route::get('/usuarios/{user}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])
->name('admin.usuarios.edit');

Route::post('/usuarios/{user}', [App\Http\Controllers\UsuarioController::class, 'update'])
->name('admin.usuarios.update');

Route::delete('/usuarios/{user}', [App\Http\Controllers\UsuarioController::class, 'destroy'])
->name('admin.usuarios.delete');

//Roles
Route::get('/roles/index', [App\Http\Controllers\RoleController::class, 'index'])
->name('roles.index');

Route::get('/roles/create', [App\Http\Controllers\RoleController::class, 'create'])
->name('roles.create');

Route::get('/roles/edit', [App\Http\Controllers\RoleController::class, 'edit'])
->name('roles.edit');

Route::post('/roles/store', [App\Http\Controllers\RoleController::class, 'store'])
->name('roles.store');

Route::delete('/roles/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'delete'])
->name('roles.delete');

Route::post('/roles/{roleId}/update', [App\Http\Controllers\RoleController::class, 'update'])
->name('roles.update');

//Rutas Unidades
Route::get('/unidades/index', [App\Http\Controllers\UnidadController::class, 'index'])
->name('admin.unidades.index');

Route::get('/unidades/create', [App\Http\Controllers\UnidadController::class, 'create'])
->name('admin.unidades.create');

Route::post('/unidades/store', [App\Http\Controllers\UnidadController::class, 'store'])
->name('admin.unidades.store');

Route::get('/unidades/edit', [App\Http\Controllers\UnidadController::class, 'edit'])
->name('admin.unidades.edit');

Route::delete('/unidades/{unidadId}/delete', [App\Http\Controllers\UnidadController::class, 'delete'])
->name('admin.unidades.delete');

Route::post('/unidades/{unidadId}/update', [\App\Http\Controllers\UnidadController::class, 'update'])
->name('admin.unidades.update');

//Rutas denuncias
Route::get('/denuncias/index', [\App\Http\Controllers\DenunciaController::class, 'index'])
->name('admin.denuncias.index');

Route::get('/denuncias/create', [\App\Http\Controllers\DenunciaController::class, 'create'])
->name('admin.denuncias.create');

Route::post('/denuncias.store', [\App\Http\Controllers\DenunciaController::class, 'store'])
->name('admin.denuncias.store');

Route::get('denuncias/edit', [\App\Http\Controllers\DenunciaController::class, 'edit'])
->name('admin.denuncias.edit');

Route::delete('/denuncias/{denunciaId}/delete', [\App\Http\Controllers\DenunciaController::class,'delete'])
->name('admin.denuncias.delete');

Route::post('/denuncias/{denunciaId}/update', [\App\Http\Controllers\DenunciaController::class, 'update'])
->name('admin.denuncias.update');
