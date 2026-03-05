<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\EmpresaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('produtos', ProdutoController::class);
    Route::get('/relatorio/estoque', [RelatorioController::class, 'estoque'])->name('relatorio.estoque');
    Route::get('/venda/{id}', [VendaController::class, 'create'])->name('venda.create');
    Route::post('/venda', [VendaController::class, 'store'])->name('venda.store');
    Route::resource('empresas', EmpresaController::class)->only(['create', 'store']);
    Route::get('/empresas/create', [EmpresaController::class, 'create'])->name('empresas.create');
    Route::post('/empresas', [EmpresaController::class, 'store'])->name('empresas.store');
    Route::delete('/empresas', [EmpresaController::class, 'destroy'])->name('empresas.destroy');
});

require __DIR__.'/auth.php';
