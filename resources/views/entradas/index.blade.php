@extends('layouts.app')
@section('content')
<h2>📥 Entradas</h2>
<a href="{{ route('entradas.create') }}" class="btn btn-success mb-3">➕ Nova Entrada</a>
<div class="alert alert-info">Lista das últimas entradas será aqui</div>
@endsection
