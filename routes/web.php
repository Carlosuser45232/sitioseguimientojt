<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;

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

//Route::get('/user/{id}', [UserController::class, 'show']);
/*
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [PagesController::class, 'fnLista'])->name('dashboard');

Route::get('/', [PagesController::class, 'fnIndex'])->name('xIndex');
//TRABAJO SEGUIMIENTO=========================================================
Route::get('/listaSeguimiento', [PagesController::class, 'fnListaSeguimiento'])->name('xListaSeguimiento');

//Route::post('/', [PagesController::class, 'fnRegistrar'])->name('Estudiante.xRegistrar');

//Route::put('/actualizar/{id}', [PagesController::class, 'fnUpdate'])->name('Estudiante.xUpdate');

//Route::get('/actualizar/{id}', [PagesController::class, 'fnEstActualizar'])->name('Estudiante.xActualizar');

//Route::delete('/eliminar/{id}', [PagesController::class, 'fnEliminar'])->name('Estudiante.xEliminar');

//Route::get('/detalle/{id}', [PagesController::class, 'fnEstDetalle'])->name('Estudiante.xDetalle');

//Route::get('/galeria/{numero?}', [PagesController::class, 'fnGaleria'])->where('numero', '[0-9]+')->name('xGaleria');



//===========================================================0







//TRABAJO CON ESTUDIANTES=============================================00
Route::post('/', [PagesController::class, 'fnRegistrar'])->name('Estudiante.xRegistrar');

Route::put('/actualizar/{id}', [PagesController::class, 'fnUpdate'])->name('Estudiante.xUpdate');

Route::get('/actualizar/{id}', [PagesController::class, 'fnEstActualizar'])->name('Estudiante.xActualizar');

Route::delete('/eliminar/{id}', [PagesController::class, 'fnEliminar'])->name('Estudiante.xEliminar');

Route::get('/detalle/{id}', [PagesController::class, 'fnEstDetalle'])->name('Estudiante.xDetalle');

Route::get('/galeria/{numero?}', [PagesController::class, 'fnGaleria'])->where('numero', '[0-9]+')->name('xGaleria');

Route::get('/lista', [PagesController::class, 'fnLista'])->name('xLista');
//=================================================================00

/*
Route::get('/lista', function () {
    
})->name('xLista');
*/



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
