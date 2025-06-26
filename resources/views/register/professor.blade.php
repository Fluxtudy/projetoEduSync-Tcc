@extends('layouts.app')

@section('title', 'Cadastro de Professor')

@section('styles')
    <style>
        .hero-bg {
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                              url('https://images.pexels.com/photos/4144228/pexels-photo-4144228.jpeg');
            background-size: cover;
            background-position: center;
        }
        .btn-glow:hover {
            box-shadow: 0 0 15px #ef4444;
        }
        .input-group:focus-within label {
            transform: translateY(-1.5rem) scale(0.85);
            color: #ef4444;
        }
        #progressBar {
            transition: width 0.3s ease;
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-bg min-h-[400px] flex items-center justify-center text-white">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">
                Cadastro de <span class="text-red-400">Professor</span>
            </h1>
            <p class="text-xl mb-8 max-w-2xl mx-auto">
                Compartilhe seu conhecimento e transforme vidas através da educação
            </p>
        </div>
    </section>

    <!-- Form Section -->
    <section class="py-16">
        <div class="container mx-auto px-6 max-w-4xl">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden p-8 md:p-10">
                <form method="POST" action="{{ route('register.professor') }}" class="space-y-6" enctype="multipart/form-data">
                    @csrf

                    <!-- Nome Completo -->
                    <div class="input-group relative">
                        <input placeholder="Nome Completo" type="text" id="nome" name="nome" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 peer"
                               value="{{ old('nome') }}">                        
                        @error('nome')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="input-group relative">
                        <input placeholder="E-mail" type="email" id="email" name="email" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 peer"
                               value="{{ old('email') }}">
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                     <!-- Telefone -->
                    <div class="input-group relative">
                        <input placeholder="Telefone" type="tel" id="telefone" name="telefone" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 peer">                        
                    </div>

                    <div class="input-group relative">
                        <input placeholder="Descrição" type="text" id="descricao" name="descricao" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 peer">                        
                    </div>

                    <!-- Senha -->
                    <div class="input-group relative">
                        <input placeholder="Senha (mínimo 8 caracteres)" type="password" id="password" name="password" required minlength="8"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 peer">
                        
                        <button type="button" class="absolute right-4 top-3 text-gray-400 hover:text-gray-600" onclick="togglePassword('password')">
                            <i class="far fa-eye"></i>
                        </button>
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Confirmar Senha -->
                    <div class="input-group relative">
                        <input placeholder="Confirmar Senha" type="password" id="password_confirmation" name="password_confirmation" required minlength="8"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 peer">                        
                    </div>

                    <!-- Área de Ensino -->
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-medium">Área de Ensino *</label>
                        <select name="area" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500">
                            <option value="" disabled selected>Selecione sua especialização</option>
                            <option value="programacao" {{ old('area') == 'programacao' ? 'selected' : '' }}>Programação</option>
                            <option value="design" {{ old('area') == 'design' ? 'selected' : '' }}>Design</option>
                            <option value="Ciencia de dados" {{ old('area') == 'ciencia de dados' ? 'selected' : '' }}>Ciência de Dados</option>
                        </select>
                        @error('area')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Experiência -->
                    <!-- <div class="space-y-2">
                        <label class="block text-gray-700 font-medium">Anos de Experiência *</label>
                        <input type="number" min="0" name="experiencia" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500"
                               value="{{ old('experiencia') }}">
                        @error('experiencia')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div> -->

                    <!-- Portfólio -->
                    <div class="input-group relative">
                        <input placeholder="Link do Portfólio/GitHub (opcional)" type="url" id="portfolio" name="portfolio"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 peer"
                               value="{{ old('portfolio') }}">                        
                        @error('portfolio')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Upload CV -->
                    <!-- <div class="space-y-2">
                        <label class="block text-gray-700 font-medium">Currículo (PDF) *</label>
                        <div class="flex items-center justify-center w-full">
                            <label for="cv" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                                    <p class="mb-2 text-sm text-gray-500">Clique para enviar ou arraste o arquivo</p>
                                    <p class="text-xs text-gray-500">PDF (máx. 5MB)</p>
                                </div>
                                <input id="cv" name="cv" type="file" class="hidden" accept=".pdf">
                            </label>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5 mt-2 hidden" id="progressContainer">
                            <div id="progressBar" class="bg-red-600 h-2.5 rounded-full" style="width: 0%"></div>
                        </div>
                        @error('cv')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div> -->

                    <!-- Termos -->
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="termos" name="termos" type="checkbox" required
                                   class="w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-500"
                                   {{ old('termos') ? 'checked' : '' }}>
                        </div>
                        <label for="termos" class="ml-3 text-sm text-gray-700">
                            Concordo com os <a href="#" class="text-red-600 hover:underline">Termos de Serviço</a> *
                        </label>
                        @error('termos')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full bg-red-500 hover:bg-red-600 text-white font-bold py-4 px-6 rounded-lg btn-glow transition-all duration-300 transform hover:scale-[1.02]">
                        <i class="fas fa-chalkboard-teacher mr-2"></i> Enviar Candidatura
                    </button>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-gray-600">
                        Já tem conta? <a href="{{route('login')}}"  class="text-red-600 font-medium hover:underline">Entrar</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
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

        // Simulação de upload
        document.getElementById('cv').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const progressContainer = document.getElementById('progressContainer');
                const progressBar = document.getElementById('progressBar');
                progressContainer.classList.remove('hidden');
                
                // Simular progresso
                let progress = 0;
                const interval = setInterval(() => {
                    progress += 10;
                    progressBar.style.width = `${progress}%`;
                    
                    if (progress >= 100) {
                        clearInterval(interval);
                        setTimeout(() => {
                            progressContainer.classList.add('hidden');
                        }, 1000);
                    }
                }, 200);
            }
        });
    </script>
@endsection