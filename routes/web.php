<?php

use Illuminate\Support\Facades\Route;
//agregamos los controladores
use App\Http\Controllers\Plantilla_baseController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\RecursoController;
use App\Http\Controllers\CronogramaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DashController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//nuestra configuracion con la lineas de comando que nos brinda laravel permision Spatie
Route::group(['middleware' => ['auth']], function(){
    ///////////////////////////Rutas para Usuarios inicio//////////////////////////////////
    Route::resource('usuarios', UsuarioController::class);
    ///////////////////////////Rutas para Usuarios final//////////////////////////////////

    ///////////////////////////Rutas para Roles inicio//////////////////////////////////
    Route::resource('roles', RolController::class);
    Route::get('fetch-roles', [RolController::class, 'fetchRol']);
    Route::get('edit-rol/{id}', [RolController::class, 'edit']);
    Route::put('update-rol/{id}', [RolController::class, 'update']);
    Route::delete('delete-rol/{id}', [RolController::class, 'destroy']);
    ///////////////////////////Rutas para Roles final//////////////////////////////////

    ///////////////////////////Rutas para Plantilla_base inicio//////////////////////////////////
    Route::resource('dash', Plantilla_baseController::class);
    ///////////////////////////Rutas para Plantilla_base final//////////////////////////////////

    ///////////////////////////Rutas para Empresas inicio//////////////////////////////////
    Route::resource('empresas', EmpresaController::class);
    Route::get('fetch-empresas', [EmpresaController::class, 'fetchEmpresa']);
    Route::get('edit-empresa/{id}', [EmpresaController::class, 'edit']);
    Route::put('update-empresa/{id}', [EmpresaController::class, 'update']);
    Route::delete('delete-empresa/{id}', [EmpresaController::class, 'destroy']);
    ///////////////////////////Rutas para Empresas final//////////////////////////////////

    ///////////////////////////Rutas para Cronogramas inicio//////////////////////////////////
    Route::resource('cronogramas', CronogramaController::class);
    ///////////////////////////Rutas para Cronogramas inicio//////////////////////////////////

    ///////////////////////////Rutas para Proyectos inicio//////////////////////////////////
    Route::resource('proyectos', ProyectoController::class);
    Route::get('fetch-proyectos', [ProyectoController::class, 'fetchProyecto']);
    Route::get('edit-proyecto/{id}', [ProyectoController::class, 'edit']);
    Route::put('update-proyecto/{id}', [ProyectoController::class, 'update']);
    Route::delete('delete-proyecto/{id}', [ProyectoController::class, 'destroy']);
    ///////////////////////////Rutas para Proyectos final//////////////////////////////////

    ///////////////////////////Rutas para Recursos inicio//////////////////////////////////
    Route::resource('recursos', RecursoController::class);
    Route::get('fetch-recursos', [RecursoController::class, 'fetchRecurso']);
    Route::get('edit-recurso/{id}', [RecursoController::class, 'edit']);
    Route::put('update-recurso/{id}', [RecursoController::class, 'update']);
    Route::delete('delete-recurso/{id}', [RecursoController::class, 'destroy']);
    ///////////////////////////Rutas para Recursos final//////////////////////////////////

    ///////////////////////////Rutas para Chart inicio//////////////////////////////////
    Route::resource('charts', ChartController::class);
    ///////////////////////////Rutas para Chart final//////////////////////////////////

    ///////////////////////////Rutas para Cronograma inicio//////////////////////////////////
    Route::resource('cronogramas', CronogramaController::class);
    Route::get('fetch-cronogramas', [CronogramaController::class, 'fetchCronograma']);
    Route::get('edit-cronograma/{id}', [CronogramaController::class, 'edit']);
    Route::put('update-cronograma/{id}', [CronogramaController::class, 'update']);
    Route::delete('delete-cronograma/{id}', [CronogramaController::class, 'destroy']);
    ///////////////////////////Rutas para Cronograma final//////////////////////////////////

    // Route::get('proyectos_cronograma', '\App\Http\Controllers\ProyectoController@cronograma_index')->name('cronograma_index');
});
