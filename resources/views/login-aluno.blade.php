@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 shadow-lg rounded-lg">
    <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('loginAluno') }}" method="POST" class="space-y-4">
        @csrf
        <div class="input-group relative">
            <input type="email" id="email" name="email" required
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 peer"
                   value="{{ old('email') }}">
            <label for="email" class="absolute left-4 top-3 px-1 bg-white text-gray-500 transition-all duration-200 pointer-events-none peer-focus:text-blue-500 peer-focus:transform peer-focus:-translate-y-4 peer-focus:scale-75">
                E-mail *
            </label>
        </div>

        <div class="input-group relative">
            <input type="password" id="password" name="password" required minlength="8"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 peer">
            <label for="password" class="absolute left-4 top-3 px-1 bg-white text-gray-500 transition-all duration-200 pointer-events-none peer-focus:text-blue-500 peer-focus:transform peer-focus:-translate-y-4 peer-focus:scale-75">
                Senha *
            </label>
            <button type="button" class="absolute right-4 top-3 text-gray-400 hover:text-gray-600" onclick="togglePassword('password')">
                <i class="far fa-eye"></i>
            </button>
        </div>

        <div class="flex items-center">
            <input type="checkbox" name="remember" id="remember" class="mr-2">
            <label for="remember">Lembrar-me</label>
        </div>

        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-4 rounded-lg transition duration-200">
            Entrar
        </button>
    </form>

    <div class="text-center mt-6 space-y-3">
        <p class="text-sm text-gray-600">Não tem conta?</p>
        <div class="flex justify-center gap-4">
            <a  class="text-blue-500 hover:text-blue-600 font-medium hover:underline transition">
                Sou Aluno
            </a>
            <span class="text-gray-400">|</span>
            <a  class="text-green-500 hover:text-green-600 font-medium hover:underline transition">
                Sou Professor
            </a>
        </div>
    </div>
</div>

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
@endsection