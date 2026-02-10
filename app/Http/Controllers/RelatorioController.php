<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Barryvdh\DomPDF\Facade\Pdf;

class RelatorioController extends Controller
{
    public function estoque()
    {
        $produtos = Produto::orderBy('estoque_atual')->get();

        $pdf = Pdf::loadView('relatorios.estoque', compact('produtos'))
                 ->setPaper('a4', 'landscape');

        return $pdf->download('relatorio_estoque_' . date('Y-m-d') . '.pdf');
    }
}
