@extends('layouts.app')
@section('content')
<h2>Lista de Produtos</h2>
<a href="{{ route('relatorio.estoque') }}" class="btn btn-danger mb-3">
    📊 Gerar Relatório PDF
</a>
<a href="{{ route('produtos.create') }}" class="btn btn-success mb-3">➕ Novo Produto</a>

<div class="table-responsive">
<table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th>Nome</th>
            <th>Estoque</th>
            <th>Preço Venda</th>
            <th>Ações</th>
            <th>Vender</th>
        </tr>
    </thead>
    <tbody>
        @forelse($produtos as $produto)
        @php $totalVendavel = $produto->estoque_atual * $produto->preco_venda; @endphp
        <tr class="{{ $produto->estoque_atual < 10 ? 'table-danger' : '' }}">
            <td><strong>{{ $produto->nome }}</strong></td>
            <td>
                <span class="badge {{ $produto->estoque_atual < 10 ? 'bg-danger' : 'bg-success' }}">
                    {{ $produto->estoque_atual }}
                </span>
            </td>
            <td>R$ {{ number_format($produto->preco_venda, 2, ',', '.') }}</td>
            <td>R$ {{ number_format($totalVendavel, 2, ',', '.') }}</td>
            <td>
                <a href="{{ route('produtos.edit', $produto) }}" class="btn btn-sm btn-warning">Editar</a>
                <!-- BOTÃO VENDA RÁPIDA -->
                <a href="{{ route('venda.create', $produto->id) }}" class="btn btn-sm btn-primary">
                🛒 Vender </a>

                <form method="POST" action="{{ route('produtos.destroy', $produto) }}" style="display:inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Confirma?')">Excluir</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center text-muted p-4">🛒 Nenhum produto cadastrado</td></tr>
        @endforelse
    </tbody>
</table>
</div>
@endsection
