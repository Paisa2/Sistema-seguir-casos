<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/usuarios/index', [App\Http\Controllers\UsuariosRController::class, 'index'])
    ->name('admin.usuarios.index');

Route::get('/usuarios/create', [App\Http\Controllers\UsuariosRController::class, 'create'])
    ->name('admin.usuarios.create');

Route::post('/usuarios/store', [App\Http\Controllers\UsuariosRController::class, 'store'])
    ->name('admin.usuarios.store');

Route::delete('/usuarios/{user}', [App\Http\Controllers\UsuariosRController::class, 'destroy'])
    ->name('admin.usuarios.delete');

Route::get('/usuarios/{user}/edit', [App\Http\Controllers\UsuariosRController::class, 'edit'])
    ->name('admin.usuarios.edit');

Route::put('/usuarios/{user}', [App\Http\Controllers\UsuariosRController::class, 'update'])
    ->name('admin.usuarios.update');



//Roles
Route::get('/roles/index', [App\Http\Controllers\RoleController::class, 'index'])
    ->name('roles.index');

Route::post('/roles/store', [App\Http\Controllers\RoleController::class, 'store'])
    ->name('roles.store');

Route::delete('/roles/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'delete'])
    ->name('roles.delete');

Route::post('/roles/{roleId}/update', [App\Http\Controllers\RoleController::class, 'update'])
    ->name('roles.update');

//permisos
Route::group(['middleware' => 'auth'], function () {
    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class);
});


//Rutas Unidades Adulto Mayor
Route::get('/unidadesA/index', [App\Http\Controllers\UnidadAdultoMController::class, 'index'])
    ->name('admin.unidadesA.index');

Route::get('/unidadesA/create', [App\Http\Controllers\UnidadAdultoMController::class, 'create'])
    ->name('admin.unidadesA.create');

Route::post('/unidadesA/store', [App\Http\Controllers\UnidadAdultoMController::class, 'store'])
    ->name('admin.unidadesA.store');

Route::get('/unidadesA/edit', [App\Http\Controllers\UnidadAdultoMController::class, 'edit'])
    ->name('admin.unidadesA.edit');

Route::delete('/unidadesA/{unidadId}/delete', [App\Http\Controllers\UnidadAdultoMController::class, 'delete'])
    ->name('admin.unidadesA.delete');

Route::post('/unidadesA/{unidadId}/update', [\App\Http\Controllers\UnidadAdultoMController::class, 'update'])
    ->name('admin.unidadesA.update');

//Rutas Unidades Slim
Route::get('/unidad/index', [App\Http\Controllers\UnidadSlimController::class, 'index'])
    ->name('admin.unidad.index');

Route::get('/unidad/create', [App\Http\Controllers\UnidadSlimController::class, 'create'])
    ->name('admin.unidad.create');

Route::post('/unidad/store', [App\Http\Controllers\UnidadSlimController::class, 'store'])
    ->name('admin.unidad.store');

Route::get('/unidad/edit', [App\Http\Controllers\UnidadSlimController::class, 'edit'])
    ->name('admin.unidad.edit');

Route::delete('/unidad/{unidadId}/delete', [App\Http\Controllers\UnidadSlimController::class, 'delete'])
    ->name('admin.unidad.delete');

Route::post('/unidad/{unidadId}/update', [\App\Http\Controllers\UnidadSlimController::class, 'update'])
    ->name('admin.unidad.update');

//Rutas Unidades Defensoria
Route::get('/unidadesDef/index', [App\Http\Controllers\UnidadDefensoriaController::class, 'index'])
    ->name('admin.unidadesDef.index');

Route::get('/unidadesDef/create', [App\Http\Controllers\UnidadDefensoriaController::class, 'create'])
    ->name('admin.unidadesDef.create');

Route::post('/unidadesDef/store', [App\Http\Controllers\UnidadDefensoriaController::class, 'store'])
    ->name('admin.unidadesDef.store');

Route::get('/unidadesDef/edit', [App\Http\Controllers\UnidadDefensoriaController::class, 'edit'])
    ->name('admin.unidadesDef.edit');

Route::delete('/unidadesDef/{unidadId}/delete', [App\Http\Controllers\UnidadDefensoriaController::class, 'delete'])
    ->name('admin.unidadesDef.delete');

Route::post('/unidadesDef/{unidadId}/update', [\App\Http\Controllers\UnidadDefensoriaController::class, 'update'])
    ->name('admin.unidadesDef.update');

//Rutas Unidades Discapacidad
Route::get('/unidadesDis/index', [App\Http\Controllers\UnidadDiscapacidadController::class, 'index'])
    ->name('admin.unidadesDis.index');

Route::get('/unidadesDis/create', [App\Http\Controllers\UnidadDiscapacidadController::class, 'create'])
    ->name('admin.unidadesDis.create');

Route::post('/unidadesDis/store', [App\Http\Controllers\UnidadDiscapacidadController::class, 'store'])
    ->name('admin.unidadesDis.store');

Route::get('/unidadesDis/edit', [App\Http\Controllers\UnidadDiscapacidadController::class, 'edit'])
    ->name('admin.unidadesDis.edit');

Route::delete('/unidadesDis/{unidadId}/delete', [App\Http\Controllers\UnidadDiscapacidadController::class, 'delete'])
    ->name('admin.unidadesDis.delete');

Route::post('/unidadesDis/{unidadId}/update', [\App\Http\Controllers\UnidadDiscapacidadController::class, 'update'])
    ->name('admin.unidadesDis.update');

//Rutas denuncias
Route::get('/denuncias/index', [App\Http\Controllers\DenunciaController::class, 'index'])
    ->name('admin.denuncias.index');

Route::get('/denuncias/create', [App\Http\Controllers\DenunciaController::class, 'create'])
    ->name('admin.denuncias.create');

Route::post('/denuncias/store', [App\Http\Controllers\DenunciaController::class, 'store'])
    ->name('admin.denuncias.store');

Route::get('/denuncias/edit', [App\Http\Controllers\DenunciaController::class, 'edit'])
    ->name('admin.denuncias.edit');

Route::delete('/denuncias/{unidadId}/delete', [App\Http\Controllers\DenunciaController::class, 'delete'])
    ->name('admin.denuncias.delete');

Route::post('/denuncias/{unidadId}/update', [\App\Http\Controllers\DenunciaController::class, 'update'])
    ->name('admin.denuncias.update');

//Ruta Casos
Route::get('/unidad/{id_unidad}/casos', [\App\Http\Controllers\CasoController::class, 'index'])
    ->name('admin.unidad.casos');


Route::get('/casos/index', [\App\Http\Controllers\CasoController::class, 'index'])
    ->name('admin.casos.index');

Route::get('/unidad/{id_unidad}/casos/create', [\App\Http\Controllers\CasoController::class, 'create'])
    ->name('admin.unidad.casos.create');

Route::post('/casos.store', [\App\Http\Controllers\CasoController::class, 'store'])
    ->name('admin.casos.store');

Route::get('/casos/edit', [\App\Http\Controllers\CasoController::class, 'edit'])
    ->name('admin.casos.edit');

Route::delete('/casos/{casosId}/delete', [\App\Http\Controllers\CasoController::class, 'delete'])
    ->name('admin.casos.delete');

Route::post('/casos/{casosId}update', [\App\Http\Controllers\CasoController::class, 'update'])
    ->name('admin.casos.update');

// Ruta de fallback para redirigir a /auth
Route::fallback(function () {
    if (Auth::check()) {
        return redirect('/auth');
    } else {
        return redirect('/login');
    }
});
