@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>🛒 Venda Rápida - {{ $produto->nome }}</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('vendas.store') }}">
                    @csrf
                    <input type="hidden" name="produto_id" value="{{ $produto->id }}">

                    <div class="mb-3">
                        <label>Produto</label>
                        <input type="text" class="form-control" value="{{ $produto->nome }} (R$ {{ number_format($produto->preco_venda,2,',','.') }})" readonly>
                    </div>

                    <div class="mb-3">
                        <label>Estoque Disponível</label>
                        <input type="number" class="form-control bg-success text-white" value="{{ $produto->estoque_atual }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label>Quantidade *</label>
                        <input type="number" name="quantidade" class="form-control @error('quantidade') is-invalid @enderror"
                               value="{{ old('quantidade', 1) }}" min="1" max="{{ $produto->estoque_atual }}" required>
                        @error('quantidade') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Cliente (opcional)</label>
                        <input type="text" name="cliente" class="form-control" value="{{ old('cliente') }}">
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-between">
                        <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-success btn-lg">✅ Confirmar Venda</button>
                        <a href="{{ route('relatorio.estoque') }}" class="btn btn-danger">📊 Ver Relatório</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
