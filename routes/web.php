<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

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

Route::get('/', [ UsuarioController::class, 'index' ])->name('home');
Route::get('/usuario/edit/{id}', [ UsuarioController::class, 'edit' ])->name('usuario.edits');
Route::put('/usuario/{id}', [ UsuarioController::class, 'update' ])->name('usuario.updates');

/** Rota dos Usuários */
Route::get('usuario/ajaxDataTable', [ UsuarioController::class, 'ajaxDataTable'])->name('usuario.ajaxDataTable');
Route::resource('usuario', UsuarioController::class);
