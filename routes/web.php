<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\VendaController;

Route::get('/', function () { return view('welcome'); });

Route::resource('produtos', ProdutoController::class);
Route::get('/relatorio/estoque', [RelatorioController::class, 'estoque'])->name('relatorio.estoque');

// VENDA SIMPLES:
Route::get('/venda/{id}', [VendaController::class, 'create'])->name('venda.create');
Route::post('/venda', [VendaController::class, 'store'])->name('venda.store');
