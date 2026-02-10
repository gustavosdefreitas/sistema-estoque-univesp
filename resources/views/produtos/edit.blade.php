@extends('layouts.app')
@section('content')
<h2>✏️ Editar Produto</h2>
<div class="row justify-content-center">
    <div class="col-md-8">
        <form method="POST" action="{{ route('produtos.update', $produto) }}">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $produto->id }}">

            <div class="mb-3">
                <label class="form-label">Nome do Produto</label>
                <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" value="{{ old('nome', $produto->nome) }}" required>
                @error('nome') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Preço Compra (R$)</label>
                    <input type="number" name="preco_compra" step="0.01" class="form-control @error('preco_compra') is-invalid @enderror" value="{{ old('preco_compra', $produto->preco_compra) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Preço Venda (R$)</label>
                    <input type="number" name="preco_venda" step="0.01" class="form-control @error('preco_venda') is-invalid @enderror" value="{{ old('preco_venda', $produto->preco_venda) }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label>Estoque Atual</label>
                <input type="number" name="estoque_atual" class="form-control @error('estoque_atual') is-invalid @enderror" value="{{ old('estoque_atual', $produto->estoque_atual) }}" min="0" required>
            </div>

            <div class="mb-3">
                <label>Fornecedor (opcional)</label>
                <input type="text" name="fornecedor" class="form-control" value="{{ old('fornecedor', $produto->fornecedor) }}">
            </div>

            <div class="mb-3">
                <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Atualizar Produto</button>
            </div>
        </form>
    </div>
</div>
@endsection
