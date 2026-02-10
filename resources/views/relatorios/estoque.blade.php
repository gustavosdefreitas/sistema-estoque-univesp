<!DOCTYPE html>
<html>
<head>
    <title>Relatório de Estoque - {{ date('d/m/Y') }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .header { text-align: center; margin-bottom: 30px; }
        .header h1 { color: #1e40af; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f3f4f6; font-weight: bold; }
        .falta { background-color: #fee2e2 !important; color: #dc2626; }
        .ok { background-color: #ecfdf5 !important; }
        .total { background-color: #1e40af !important; color: white; font-weight: bold; }
        .critico { font-size: 20px; color: #dc2626; }
    </style>
</head>
<body>
    <div class="header">
        <h1>📦 RELATÓRIO DE ESTOQUE</h1>
        <p>Pequeno Comércio - {{ date('d/m/Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Produto</th>
                <th>Estoque Atual</th>
                <th>Preço Venda</th>
                <th>Total Vendável</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php $totalGeral = 0; @endphp
            @forelse($produtos as $produto)
                @php
                    $status = $produto->estoque_atual < 10 ? 'CRÍTICO' : 'OK';
                    $cor = $produto->estoque_atual < 10 ? 'falta' : 'ok';
                    $totalVendavel = $produto->estoque_atual * $produto->preco_venda;
                    $totalGeral += $totalVendavel;
                @endphp
                <tr class="{{ $cor }}">
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>
                        @if($produto->estoque_atual < 10)
                            <span class="critico">{{ $produto->estoque_atual }}</span>
                        @else
                            {{ $produto->estoque_atual }}
                        @endif
                    </td>
                    <td>R$ {{ number_format($produto->preco_venda, 2, ',', '.') }}</td>
                    <td>R$ {{ number_format($totalVendavel, 2, ',', '.') }}</td>
                    <td>{{ $status }}</td>
                </tr>
            @empty
                <tr><td colspan="6" style="text-align:center; padding:50px;">Nenhum produto cadastrado</td></tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr class="total">
                <td colspan="4"><strong>TOTAL GERAL</strong></td>
                <td><strong>R$ {{ number_format($totalGeral, 2, ',', '.') }}</strong></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
