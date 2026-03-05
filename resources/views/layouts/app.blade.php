<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Estoque - Univesp</title>

    <!-- CDN BOOTSTRAP 5.3 (SEM VITE) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            @php $empresa = \App\Models\Empresa::first(); @endphp
            <a class="navbar-brand fw-bold" href="{{ route('produtos.index') }}">
                <i class="fas fa-box"></i> Estoque Univesp
            </a>
            <div class="navbar-nav ms-auto">
                @auth
                    <span class="navbar-text me-3">
                        <i class="fas fa-user"></i> {{ auth()->user()->name }}
                    </span>
                    <a class="nav-link" href="{{ route('produtos.index') }}">📦 Produtos</a>
                    <a class="nav-link" href="{{ route('relatorio.estoque') }}">📊 Relatório</a>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button class="nav-link btn btn-link p-0">🚪 Sair</button>
                    </form>
                @else
                    <a class="nav-link" href="{{ route('login') }}">🔐 Login</a>
                    <a class="nav-link" href="{{ route('register') }}">📝 Cadastrar</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- ALERTAS -->
    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <!-- BOOTSTRAP JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
