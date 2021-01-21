<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\EmpleadosController;

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

Route::get('/', [EmpleadosController::class, 'lista']);

Route::get('/registrar', [EmpleadosController::class, 'empleadoform']);

Route::post('/guardar',[EmpleadosController::class, 'guardar'])->name('guardar');

Route::delete('/delete/{id}',[EmpleadosController::class, 'delete'])->name('delete');

Route::get('/editar/{id}',[EmpleadosController::class, 'editar'])->name('editar');

Route::patch('/edit/{id}',[EmpleadosController::class, 'edit'])->name('edit');

