@extends('layouts.app')

@section('title', 'Dashboard - EduSync')

@section('content')
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - EduSync</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .hero-bg {
            background-image: linear-gradient(135deg, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.4) 100%), 
                              url('https://images.pexels.com/photos/577585/pexels-photo-577585.jpeg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .btn-glow:hover {
            box-shadow: 0 0 15px #3b82f6;
        }
        .sticky-nav {
            position: sticky;
            top: 0;
            z-index: 50;
            backdrop-filter: blur(10px);
        }
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #3b82f6;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
    </style>
</head>
<body class="font-sans bg-gray-50">
    <!-- Navigation -->
    <nav class="sticky-nav bg-white/80 shadow-sm">
        <div class="container mx-auto px-6 py-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="#" class="flex items-center">
                        <i class="fas fa-laptop-code text-blue-500 text-2xl mr-2"></i>
                        <span class="text-xl font-bold text-gray-800">EduSync</span>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-500 transition">Dashboard</a>
                    <a href="#services" class="text-gray-700 hover:text-blue-500 transition">Cursos</a>
                    <a href="{{ route('profile.edit') }}" class="text-gray-700 hover:text-blue-500 transition">Meu Perfil</a>
                    
                    <!-- Menu do Usuário -->
                    <div class="relative group">
                        <div class="flex items-center space-x-2 cursor-pointer">
                            <div class="user-avatar">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <span>{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden group-hover:block z-50">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50">Configurações</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-50">Sair</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="md:hidden">
                    <button class="text-gray-700 focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-bg min-h-[50vh] flex items-center justify-center text-white">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                Bem-vindo, <span class="text-blue-400">{{ Auth::user()->name }}</span>
            </h1>
            <p class="text-xl md:text-2xl mb-10 max-w-2xl mx-auto">
                O que você gostaria de aprender hoje?
            </p>
            
            @if(Auth::user()->tipo === 'aluno')
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('cursos.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-4 px-8 rounded-full btn-glow transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-book-open mr-2"></i> Explorar Cursos
                </a>
                <a href="{{ route('professores.index') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-4 px-8 rounded-full btn-glow transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-chalkboard-teacher mr-2"></i> Encontrar Professores
                </a>
            </div>
            @else
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('aulas.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-4 px-8 rounded-full btn-glow transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-calendar-alt mr-2"></i> Minhas Aulas
                </a>
                <a href="{{ route('perfil.edit') }}" class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-4 px-8 rounded-full btn-glow transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-user-edit mr-2"></i> Editar Perfil
                </a>
            </div>
            @endif
        </div>
    </section>

    <!-- Conteúdo Personalizado -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">
                @if(Auth::user()->tipo === 'aluno')
                Seus Cursos em Andamento
                @else
                Suas Próximas Aulas
                @endif
            </h2>
            
            <!-- Aqui você pode adicionar conteúdo dinâmico -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Exemplo de card -->
                <div class="bg-gray-50 rounded-xl shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="bg-blue-100 p-3 rounded-full mr-4">
                            <i class="fas fa-code text-blue-500 text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold">Introdução ao Python</h3>
                    </div>
                    <p class="text-gray-600 mb-4">Aprenda os fundamentos da programação com Python</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">Progresso: 65%</span>
                        <a href="#" class="text-blue-500 hover:text-blue-600 text-sm font-medium">Continuar</a>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                        <div class="bg-blue-500 h-2 rounded-full" style="width: 65%"></div>
                    </div>
                </div>
                
                <!-- Adicione mais cards conforme necessário -->
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <!-- Mesmo footer da sua página inicial -->
    </footer>

    <script>
        // Mobile menu toggle
        document.querySelector('.md\\:hidden button').addEventListener('click', function() {
            // Implement mobile menu toggle functionality here
        });
    </script>
</body>
</html>
@endsection