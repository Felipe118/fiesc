<?php

use App\Http\Controllers\ContaController;
use App\Http\Controllers\MovimentacaoController;
use App\Http\Controllers\PessoaController;
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

Route::get('/', [PessoaController::class,'index'])->name('pessoa.index');
Route::get('/pessoa', [PessoaController::class,'get'])->name('pessoa.get');
Route::get('/getPessoa', [PessoaController::class,'getPessoas'])->name('pessoa.getPessoas');
Route::post('/storePessoa', [PessoaController::class,'store'])->name('pessoa.store');
Route::post('/get', [PessoaController::class,'getPessoa'])->name('pessoa.getPessoa');
Route::post('/updatePessoa', [PessoaController::class,'update'])->name('pessoa.edit');
Route::post('/deletePessoa', [PessoaController::class,'delete'])->name('pessoa.delete');
Route::get('/conta', [ContaController::class,'index'])->name('conta.index');
Route::get('/getContaPessoa', [ContaController::class,'getContaPessoa'])->name('conta.getContaPessoa');
Route::post('/getContaUnique', [ContaController::class,'getContaUnique'])->name('conta.getContaUnique');
Route::post('/storeConta', [ContaController::class,'store'])->name('conta.store');
Route::post('/getConta', [ContaController::class,'getConta'])->name('conta.getConta');
Route::post('/update', [ContaController::class,'update'])->name('conta.edit');
Route::post('/delete', [ContaController::class,'delete'])->name('conta.delete');
Route::get('/movimentacao', [MovimentacaoController::class,'index'])->name('movimentacao.index');
Route::post('/getMovimentacao', [MovimentacaoController::class,'get'])->name('movimentacao.getMovimentacao');
Route::post('/storeMovimentacao', [MovimentacaoController::class,'store'])->name('movimentacao.storeMovimentacao');
Route::post('/totalSaldo', [MovimentacaoController::class,'totalSaldo'])->name('movimentacao.totalSaldo');


