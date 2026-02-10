<?php

namespace App\Http\Controllers;

use App\Models\Saida;
use App\Models\Produto;
use Illuminate\Http\Request;

class SaidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
            'valor_unitario' => 'required|numeric|min:0',
            'data' => 'required|date'
        ]);

        $produto = Produto::findOrFail($request->produto_id);

        // Verifica se tem estoque suficiente
        if ($produto->estoque_atual < $request->quantidade) {
            return back()->withErrors(['quantidade' => 'Estoque insuficiente!']);
        }

        $saida = Saida::create($request->all());
        $saida->produto->decrement('estoque_atual', $saida->quantidade);

        return redirect()->route('saidas.index')->with('success', 'Saída registrada!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Saida $saida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Saida $saida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Saida $saida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Saida $saida)
    {
        //
    }
}
