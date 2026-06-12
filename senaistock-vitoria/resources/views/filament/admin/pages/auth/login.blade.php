<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SENAISTOCK</title>
    @livewireStyles
    @vite(['resources/css/app.css'])
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body, html {
            margin: 0;
            padding: 0;
            overflow: hidden;
            height: 100vh;
        }
        
        .fi-simple-layout { 
            padding: 0 !important; 
            max-width: 100% !important; 
            min-height: 100vh !important; 
            display: block !important; 
        }
        
        .fi-simple-main { 
            padding: 0 !important; 
            max-width: 100% !important; 
            width: 100% !important; 
            margin: 0 !important; 
        }
        
        .fi-simple-page { 
            padding: 0 !important; 
            margin: 0 !important; 
        }
        
        .fi-simple-layout > div { 
            padding: 0 !important; 
            gap: 0 !important; 
        }
        
        main { 
            padding: 0 !important; 
        }
        
        .fi-body { 
            padding: 0 !important; 
        }
        
        #app { 
            min-height: 100vh; 
        }
    </style>
</head>
<body>
    <div style="height: 100vh; display: flex; font-family: sans-serif; overflow: hidden;">
        {{-- Lado esquerdo --}}
        <div style="width: 50%; background-image: url('{{ asset('images/bg-login.jpg') }}'); background-size: cover; background-position: center; position: relative; display: flex; flex-direction: column; justify-content: space-between; padding: 3rem;">
            <div style="position: absolute; inset: 0; background: rgba(0,0,0,0.65);"></div>

            <div style="position: relative; z-index: 10;">
                <h1 style="font-size: 2.5rem; font-weight: 900; color: white; margin: 0;">
                    <span style="color: #ef4444;">SENAI</span>STOCK
                </h1>
                <p style="color: #d1d5db; margin: 0.25rem 0 0;">GESTÃO DE ESTOQUES</p>
                <p style="color: white; font-size: 1.4rem; font-weight: 700; margin-top: 2rem;">
                    Controle completo do<br>estoque de <span style="color: #f87171;">livros didáticos</span>
                </p>

                <div style="margin-top: 2rem; display: flex; flex-direction: column; gap: 1rem;">
                    @foreach([
                        ['Cadastro de Livros', 'Cadastre e gerencie todos os livros didáticos.'],
                        ['Controle de Estoque', 'Acompanhe entradas, saídas e quantidade disponível.'],
                        ['Empréstimos e Devoluções', 'Gerencie empréstimos, devoluções e reservas de livros.'],
                        ['Relatórios e Indicadores', 'Tenha acesso a relatórios e indicadores de desempenho.'],
                    ] as $item)
                    <div style="display: flex; align-items: flex-start; gap: 0.75rem;">
                        <div style="width: 2.5rem; height: 2.5rem; background: #dc2626; border-radius: 6px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" style="width:1.2rem;height:1.2rem;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                            </svg>
                        </div>
                        <div>
                            <p style="color: white; font-weight: 600; margin: 0;">{{ $item[0] }}</p>
                            <p style="color: #9ca3af; font-size: 0.85rem; margin: 0.1rem 0 0;">{{ $item[1] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div style="position: relative; z-index: 10;">
                <p style="color: white; font-weight: 900; font-size: 1.2rem; margin: 0;">SENAI</p>
                <p style="color: #9ca3af; font-size: 0.8rem; margin: 0;">Formando talentos, construindo o futuro.</p>
            </div>
        </div>

        {{-- Lado direito --}}
        <div style="width: 50%; display: flex; align-items: center; justify-content: center; background: white; padding: 2rem; overflow-y: auto;">
            <div style="width: 100%; max-width: 400px;">
                <div style="text-align: center; margin-bottom: 2rem;">
                    <h2 style="font-size: 2rem; font-weight: 900; margin: 0;">
                        <span style="color: #dc2626;">SENAI</span>STOCK
                    </h2>
                    <p style="color: #6b7280; font-size: 0.85rem; margin: 0.25rem 0 0;">GESTÃO DE ESTOQUES</p>
                    <p style="font-size: 1.5rem; font-weight: 700; margin: 1.5rem 0 0;">Bem-vindo!</p>
                    <p style="color: #6b7280; font-size: 0.875rem; margin: 0.5rem 0 0;">Faça login para acessar o sistema de gestão de estoque de livros didáticos.</p>
                </div>

                {{-- FORMULÁRIO --}}
                <form method="POST" action="{{ route('login.authenticate') }}" style="width: 100%;">
                    @csrf
                    
                    <div style="margin-bottom: 1rem;">
                        <label for="re" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.5rem;">RE</label>
                        <input type="text" name="re" id="re" value="{{ old('re') }}" required autocomplete="username" style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.375rem; font-size: 0.875rem;">
                        @error('re')
                            <p style="color: #dc2626; font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div style="margin-bottom: 1rem;">
                        <label for="password" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.5rem;">Senha</label>
                        <input type="password" name="password" id="password" required style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.375rem; font-size: 0.875rem;">
                        @error('password')
                            <p style="color: #dc2626; font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    @if($errors->any())
                        <div style="background: #fee2e2; border: 1px solid #fecaca; color: #991b1b; padding: 0.75rem; border-radius: 8px; margin-top: 1rem;">
                            @foreach($errors->all() as $error)
                                <p style="margin: 0; font-size: 0.875rem;">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    
                    <button type="submit" style="width: 100%; margin-top: 1.5rem; background: #dc2626; color: white; font-weight: 700; padding: 0.75rem; border-radius: 8px; border: none; cursor: pointer; font-size: 1rem; letter-spacing: 0.05em; text-transform: uppercase;">
                        Entrar
                    </button>
                </form>

                <p style="text-align: center; color: #9ca3af; font-size: 0.75rem; margin-top: 2rem; line-height: 1.6;">
                    © 2026 <strong>SENAISTOCK</strong><br>
                    Sistema de Gestão de Estoque de Livros Didáticos<br>
                    Versão 1.0
                </p>
            </div>
        </div>
    </div>
    
    @livewireScripts
</body>
</html>