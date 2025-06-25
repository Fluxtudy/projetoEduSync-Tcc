@extends('layouts.app')

@section('title', 'Cadastro de Aluno')

@section('content')
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduSync - Cadastro de Aluno</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .hero-bg {
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                              url('https://images.pexels.com/photos/4145153/pexels-photo-4145153.jpeg');
            background-size: cover;
            background-position: center;
        }
        .btn-glow:hover {
            box-shadow: 0 0 15px #3b82f6;
        }
        .input-group:focus-within label {
            transform: translateY(-1.5rem) scale(0.85);
            color: #3b82f6;
        }
    </style>
</head>
<body class="font-sans bg-gray-100">
    <!-- Hero Section -->
    <section class="hero-bg min-h-[400px] flex items-center justify-center text-white">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">
                Cadastro de <span class="text-blue-400">Aluno</span>
            </h1>
            <p class="text-xl mb-8 max-w-2xl mx-auto">
                Comece sua jornada na tecnologia com os melhores especialistas
            </p>
        </div>
    </section>

    <!-- Form Section -->
    <section class="py-16">
        <div class="container mx-auto px-6 max-w-4xl">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden p-8 md:p-10">
                <form method="POST" action="{{ route('register.aluno') }}" class="space-y-6">
                    @csrf
                    
                    <!-- Nome Completo -->
                    <div class="input-group relative">
                        <p>Nome completo</p>
                        <input placeholder = "Nome completo" type="text" id="nome" name="nome" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 peer">
                        <!-- <label for="nome" class="absolute left-4 top-3 px-1 bg-white text-gray-500 transition-all duration-200 pointer-events-none peer-focus:text-blue-500">
                            Nome Completo *
                        </label> -->
                    </div>

                    <!-- Email -->
                    <div class="input-group relative">
                        <input type="email" id="email" name="email" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 peer">
                        <label for="email" class="absolute left-4 top-3 px-1 bg-white text-gray-500 transition-all duration-200 pointer-events-none peer-focus:text-blue-500">
                            E-mail *
                        </label>
                    </div>

                    <!-- Telefone -->
                    <div class="input-group relative">
                        <input type="tel" id="telefone" name="telefone" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 peer">
                        <label for="telefone" class="absolute left-4 top-3 px-1 bg-white text-gray-500 transition-all duration-200 pointer-events-none peer-focus:text-blue-500">
                            Telefone *
                        </label>
                    </div>

                    <!-- Senha -->
                    <div class="input-group relative">
                        <input type="password" id="password" name="password" required minlength="8"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 peer">
                        <label for="password" class="absolute left-4 top-3 px-1 bg-white text-gray-500 transition-all duration-200 pointer-events-none peer-focus:text-blue-500">
                            Senha (mínimo 8 caracteres) *
                        </label>
                        <button type="button" class="absolute right-4 top-3 text-gray-400 hover:text-gray-600" onclick="togglePassword('password')">
                            <i class="far fa-eye"></i>
                        </button>
                    </div>

                    <!-- Confirmar Senha -->
                    <div class="input-group relative">
                        <input type="password" id="password_confirmation" name="password_confirmation" required minlength="8"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 peer">
                        <label for="password_confirmation" class="absolute left-4 top-3 px-1 bg-white text-gray-500 transition-all duration-200 pointer-events-none peer-focus:text-blue-500">
                            Confirmar Senha *
                        </label>
                        <button type="button" class="absolute right-4 top-3 text-gray-400 hover:text-gray-600" onclick="togglePassword('password_confirmation')">
                            <i class="far fa-eye"></i>
                        </button>
                    </div>

                    <!-- Área de Interesse -->
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium">Área de Interesse *</label>
                        <select name="interesse" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="" disabled selected>Selecione uma opção</option>
                            <option value="programacao">Programação</option>
                            <option value="design">Design</option>
                            <option value="dados">Ciência de Dados</option>
                        </select>
                    </div>

                    <!-- Termos -->
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="termos" name="termos" type="checkbox" required
                                   class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        </div>
                        <label for="termos" class="ml-3 text-sm text-gray-700">
                            Concordo com os <a href="#" class="text-blue-600 hover:underline">Termos de Serviço</a> *
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-4 px-6 rounded-lg btn-glow transition-all duration-300 transform hover:scale-[1.02]">
                        <i class="fas fa-user-plus mr-2"></i> Criar Conta
                    </button>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-gray-600">
                        Já tem uma conta? <a href="{{route('login')}}" class="text-blue-500 hover:underline">Entrar</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <script>
        function togglePassword(id) {
            const input = document.getElementById(id);
            const icon = input.nextElementSibling.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>
</body>
</html>
@endsection 