<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ContactoController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('persona/crear',[PersonaController::class, 'create'])->name('persona.create');
Route::post('persona/guardar',[PersonaController::class,'store'])->name('persona.store'); 
Route::get('persona',[PersonaController::class,'index'])->name('persona.index');


Route::get('contacto/crear',[ContactoController::class, 'create'])->name('contacto.create');
Route::post('contacto/guardar',[ContactoController::class,'store'])->name('contacto.store'); 
Route::get('contacto',[ContactoController::class,'index'])->name('contacto.index');
Route::get('contacto/edit/{contacto}',[ContactoController::class,'edit'])->name('contacto.edit');
Route::post('contacto/actualizar/{contacto}',[ContactoController::class,'update'])->name('contacto.update');
Route::delete('eliminar/contacto/{contacto}',[ContactoController::class,'eliminar'])->name('contacto.delete');
