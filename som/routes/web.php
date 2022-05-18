<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\MusicaController;
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


// ROTA PUBLIC
Route::get('/', [AlbumController::class, 'index']);
Route::get('/details/{id}', [AlbumController::class, 'details']);

// DASHBOARD - ALBUM
Route::get('/dashboard', [AlbumController::class, 'dashboard'])->middleware('auth');
Route::get('/dashboard/create', [AlbumController::class, 'create'])->middleware('auth'); // formulario create
Route::get('/dashboard/{id}', [AlbumController::class, 'show'])->middleware('auth');
Route::get('/dashboard/edit/{id}', [AlbumController::class, 'edit'])->middleware('auth'); // formulario edit
Route::post('/dashboard', [AlbumController::class, 'store'])->middleware('auth');
Route::put('/dashboard/update/{id}', [AlbumController::class, 'update'])->middleware('auth');
Route::put('/dashboard/updateFile/{id}', [AlbumController::class, 'updateFile'])->middleware('auth');
Route::delete('/dashboard/{id}', [AlbumController::class, 'destroy'])->middleware('auth');

// GÊNERO
Route::get('/genero', [GeneroController::class, 'index'])->middleware('auth'); // listagem
Route::get('/genero/create', [GeneroController::class, 'create'])->middleware('auth'); // formulario create
Route::get('/genero/edit/{id}', [GeneroController::class, 'edit'])->middleware('auth'); // formulario edit
Route::post('/genero', [GeneroController::class, 'store'])->middleware('auth');
Route::put('/genero/update/{id}', [GeneroController::class, 'update'])->middleware('auth');
Route::delete('/genero/{id}', [GeneroController::class, 'destroy'])->middleware('auth');

// MÚSICA
Route::get('/musica', [MusicaController::class, 'index'])->middleware('auth'); // listagem
Route::get('/musica/create/{id}', [MusicaController::class, 'create'])->middleware('auth'); // formulario create
Route::get('/musica/edit/{id}', [MusicaController::class, 'edit'])->middleware('auth'); // formulario edit
Route::get('/musica/editar/{id}', [MusicaController::class, 'editar'])->middleware('auth'); // formulario edit
Route::post('/musica', [MusicaController::class, 'store'])->middleware('auth');
Route::put('/musica/update/{id}', [MusicaController::class, 'update'])->middleware('auth');
Route::put('/musica/atualizar/{id}', [MusicaController::class, 'atualizar'])->middleware('auth');
Route::delete('/musica/{id}', [MusicaController::class, 'destroy'])->middleware('auth'); // deleta a partir dos detalhes do album
Route::delete('/musica/delete/{id}', [MusicaController::class, 'delete'])->middleware('auth'); // deleta a partir da listagem de musicas