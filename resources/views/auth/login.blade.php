<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🔐 Login - Estoque Univesp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .login-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            border: none;
            max-width: 450px;
            width: 100%;
            padding: 2.5rem;
        }
        .logo-title {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(45deg, #1e40af, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-align: center;
            margin-bottom: 1rem;
        }
        .subtitle {
            color: #6b7280;
            text-align: center;
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }
        .btn-login {
            background: linear-gradient(45deg, #1e40af, #3b82f6);
            border: none;
            padding: 0.75rem;
            font-weight: 600;
            border-radius: 12px;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(30,64,175,0.4);
        }
        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 0.2rem rgba(59,130,246,0.25);
        }
        .floating-icons {
            position: absolute;
            font-size: 2rem;
            color: #3b82f6;
            top: 50%;
            transform: translateY(-50%);
            right: 15px;
            z-index: 10;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <!-- HEADER LOGO -->
            <div class="text-center mb-4">
                <div class="logo-title">
                    <i class="fas fa-box-open me-2"></i>
                    SISTEMA DE ESTOQUE
                </div>
                <p class="subtitle fw-semibold">
                    <i class="fas fa-store me-1"></i>
                    Controle Inteligente para Pequeno Comércio
                </p>
            </div>

            <!-- FORMULÁRIO -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- EMAIL -->
                <div class="position-relative mb-4">
                    <i class="fas fa-envelope floating-icons"></i>
                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                           placeholder="Digite seu email">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- SENHA -->
                <div class="position-relative mb-4">
                    <i class="fas fa-lock floating-icons"></i>
                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                           name="password" required autocomplete="current-password" placeholder="Senha">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- CHECKBOX -->
                <div class="mb-4 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">
                        Lembrar-me
                    </label>
                </div>

                <!-- BOTÃO LOGIN -->
                <button type="submit" class="btn btn-login btn-lg w-100 mb-3">
                    <i class="fas fa-sign-in-alt me-2"></i>
                    ACESSAR SISTEMA
                </button>

                <!-- LINK REGISTER -->
                @if (Route::has('register'))
                    <div class="text-center">
                        <p class="text-muted mb-0">Não tem conta?</p>
                        <a href="{{ route('register') }}" class="text-decoration-none fw-semibold text-primary">
                            <i class="fas fa-user-plus me-1"></i>Criar Conta Gratuita
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
