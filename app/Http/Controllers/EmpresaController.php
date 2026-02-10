<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    public function create()
    {
        $empresa = Empresa::first();
        return view('empresas.create', compact('empresa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_fantasia' => 'required|string|max:255',
            'razao_social' => 'required|string|max:255',
            'cnpj' => 'required|string|max:18',
            'endereco' => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email|max:255'
        ]);

        Empresa::updateOrCreate(['id' => 1], $request->all());

        return redirect()->route('produtos.index')
            ->with('success', '✅ Dados da empresa cadastrados!');
    }
    public function destroy()
    {
        $empresa = Empresa::first();
            if ($empresa) {
                $empresa->delete();
                return redirect()->route('empresas.create')
                    ->with('success', '✅ Dados da empresa excluídos!');
            }

        return redirect()->route('produtos.index')
            ->with('info', 'ℹ️ Nenhuma empresa cadastrada.');
    }

}
