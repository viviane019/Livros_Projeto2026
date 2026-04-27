<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - SenaiStock</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background: #1a1a1a;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            display: flex;
            width: 640px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,0.5);
        }

        .card-image {
            width: 45%;
            background-color: #c8102e;
            min-height: 420px;
        }

        .card-form {
            width: 55%;
            background: #fff;
            padding: 40px 35px;
        }

        .logo {
            text-align: center;
            margin-bottom: 6px;
        }

        .logo h1 {
            font-size: 22px;
            color: #e63946;
            font-weight: 700;
        }

        .logo p {
            font-size: 12px;
            color: #888;
            margin-bottom: 24px;
        }

        .form-group {
            margin-bottom: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            outline: none;
            transition: border 0.2s;
        }

        .form-group input:focus {
            border-color: #e63946;
        }

        .form-group input.is-invalid {
            border-color: red;
        }

        .error-msg {
            color: red;
            font-size: 12px;
            margin-top: 4px;
        }

        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            margin-bottom: 18px;
            color: #555;
        }

        .options a { color: #e63946; text-decoration: none; }

        .btn-login {
            width: 100%;
            padding: 11px;
            background: #1a73e8;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-login:hover { background: #1558b0; }

        .register {
            text-align: center;
            font-size: 12px;
            margin-top: 16px;
            color: #555;
        }

        .register a { color: #e63946; text-decoration: none; }
    </style>
</head>
<body>

<div class="card">
    <div class="card-image"></div>

    <div class="card-form">
        <div class="logo">
            <h1>🗂 SenaiStock</h1>
            <p>Controle de Estoque da Biblioteca</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <input
                    type="text"
                    name="nr"
                    placeholder="Número de Registro (NR)"
                    value="{{ old('nr') }}"
                    class="{{ $errors->has('nr') ? 'is-invalid' : '' }}"
                    required
                >
                @error('nr')
                    <div class="error-msg">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input
                    type="password"
                    name="password"
                    placeholder="Senha"
                    required
                >
            </div>

            <div class="options">
                <label>
                    <input type="checkbox" name="remember"> Lembrar-me
                </label>
                <a href="#">Esqueceu a senha?</a>
            </div>

            <button type="submit" class="btn-login">Entrar</button>
        </form>

        <div class="register">
            Não tem uma conta? <a href="#">Cadastre-se</a>
        </div>
    </div>
</div>

</body>
</html>