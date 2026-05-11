<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - SenaiStock</title>
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
            min-height: 500px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
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

        .logo img {
            width: 150px;
            height: auto;
            margin-bottom: 10px;
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
         /* Aplica a cor vermelha no preenchimento do checkbox */
    #checkTermos {
        accent-color: red;
        /* Opcional: aumenta um pouco o tamanho para facilitar o clique */
        width: 18px;
        height: 18px;
        vertical-align: middle;
    }

    /* Opcional: estiliza os links para combinarem com o tema */
    label[for="checkTermos"] a {
        color: red;
        text-decoration: none;
    }
    
    label[for="checkTermos"] a:hover {
        text-decoration: underline;
    }


        .register a { color: #e63946; text-decoration: none; }
    </style>
</head>
<body>

<div class="card">

    <div class="card-image" style="background-image: url('{{ asset('Imagens/telacadastro.jpg') }}');"></div>

    <div class="card-form">
        <div class="logo">
            <img src="{{ asset('Imagens/logo.png') }}">
            <p>Controle de Estoque da Biblioteca</p>
        </div>

        <form method="POST" action="{{ route('cadastro.store') }}">
            @csrf

            <div class="form-group">
                <input
                    type="text"
                    name="name"
                    placeholder="Nome completo"
                    value="{{ old('name') }}"
                    class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                    required
                >
                @error('name')
                    <div class="error-msg">{{ $message }}</div>
                @enderror
            </div>

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
                    class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                    required
                >
                @error('password')
                    <div class="error-msg">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="Confirmar senha"
                    required
                >
            </div>

            <div class="form-group" style="margin-bottom: 18px;">
                <input type="checkbox" id="checkTermos" onchange="document.getElementById('btnEnviar').disabled = !this.checked;">
                <label for="checkTermos" style="font-size: 12px; color: #555;">Concordo com os <a href="termos-de-servico.html" target="_blank" style="color: #e63946; text-decoration: none;">Termos de Serviço</a> e a <a href="politica-de-privacidade.html" target="_blank" style="color: #e63946; text-decoration: none;">Política de Privacidade</a></label>
            </div>

            <button type="submit" class="btn-login" id="btnEnviar" disabled>Cadastrar</button>

        </form>

        <div class="register">
            Já tem uma conta? <a href="{{ route('login') }}">Faça login</a>
        </div>
    </div>
</div>

</body>
</html>