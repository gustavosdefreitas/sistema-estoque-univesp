@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4><i class="fas fa-building"></i> Dados da Empresa</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('empresas.store') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Nome Fantasia *</label>
                            <input type="text" name="nome_fantasia" class="form-control @error('nome_fantasia') is-invalid @enderror"
                                   value="{{ old('nome_fantasia', $empresa->nome_fantasia ?? '') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Razão Social *</label>
                            <input type="text" name="razao_social" class="form-control @error('razao_social') is-invalid @enderror"
                                   value="{{ old('razao_social', $empresa->razao_social ?? '') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold">CNPJ *</label>
                            <input type="text" name="cnpj" class="form-control @error('cnpj') is-invalid @enderror"
                                   value="{{ old('cnpj', $empresa->cnpj ?? '') }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold">Telefone *</label>
                            <input type="text" name="telefone" class="form-control @error('telefone') is-invalid @enderror"
                                   value="{{ old('telefone', $empresa->telefone ?? '') }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold">Email *</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', $empresa->email ?? '') }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Endereço Completo *</label>
                        <textarea name="endereco" class="form-control @error('endereco') is-invalid @enderror" rows="2" required>{{ old('endereco', $empresa->endereco ?? '') }}</textarea>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-between">
                        <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-save"></i> Salvar Dados
                        </button>
                        @if($empresa)
                            <form method="POST" action="{{ route('empresas.destroy') }}" style="display:inline"
                                onsubmit="return confirm('⚠️ Excluir TODOS dados da empresa?\nIsso remove nome, CNPJ, endereço...')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-lg">
                                    <i class="fas fa-trash-alt"></i> Excluir Empresa
                                </button>
                            </form>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
