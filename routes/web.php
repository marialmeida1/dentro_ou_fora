<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\VotacaoController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/candidato/index', [CandidatoController::class, 'show'])->name('candidato.index')->middleware('auth');


Route::get('/candidato/create', [CandidatoController::class, 'create'])->name('candidato.create')->middleware('auth');
Route::post('/candidato/create', [CandidatoController::class, 'store'])->name('candidato.store')->middleware('auth');
Route::get('/candidato/delete/{id}', [CandidatoController::class, 'delete'])->name('candidato.delete')->middleware('auth');

Route::get('/categoria/index', [CategoriaController::class, 'show'])->name('categoria.index')->middleware('auth');
Route::get('/categoria/create', [CategoriaController::class, 'create'])->name('categoria.create')->middleware('auth');
Route::post('/categoria/create', [CategoriaController::class, 'store'])->name('categoria.store')->middleware('auth');
Route::get('/categoria/delete/{id}', [CategoriaController::class, 'delete'])->name('categoria.delete')->middleware('auth');

Route::get('/votacao/index', [VotacaoController::class, 'show'])->name('votacao.index')->middleware('auth');
Route::get('/votacao/create', [VotacaoController::class, 'create'])->name('votacao.create')->middleware('auth');
Route::post('/votacao/create', [VotacaoController::class, 'store'])->name('votacao.store')->middleware('auth');
Route::get('/votacao/delete/{id}', [VotacaoController::class, 'delete'])->name('votacao.delete')->middleware('auth');
Route::get('/votacao/true/{id}', [VotacaoController::class, 'true'])->name('votacao.true')->middleware('auth');
Route::get('/votacao/false{id}', [VotacaoController::class, 'false'])->name('votacao.false')->middleware('auth');

Route::get('/votacao/{codigo}', [VotacaoController::class, 'votacao'])->name('votacao.votacao');
Route::post('/votacao/rodada', [VotacaoController::class, 'rodada'])->name('votacao.rodada');
