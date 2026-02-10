<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Venda;

class VendaController extends Controller
{
    public function create($id)
    {
        $produto = Produto::findOrFail($id);
        return view('vendas.create', compact('produto'));
    }

    public function store(Request $request)
    {
        $produto = Produto::findOrFail($request->produto_id);

        $request->validate([
            'quantidade' => 'required|integer|min:1|max:' . $produto->estoque_atual
        ]);

        $produto->decrement('estoque_atual', $request->quantidade);

        return redirect()->route('produtos.index')->with('success', '✅ Venda OK!');
    }
}
