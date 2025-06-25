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

    <form id="loginForm" action="{{ route('authenticate') }}" method="POST" class="space-y-4">
        @csrf
         <label for="tipo" class="block mb-2 font-semibold">Tipo de usuário:</label>
    <select id="tipo" name="tipo" class="w-full p-2 border rounded mb-4">
        <option value="aluno">Aluno</option>
        <option value="professor">Professor</option>
    </select>

    <input type="email" name="email" placeholder="Email" class="w-full mb-3 p-2 border rounded" required />
    <input type="password" name="password" placeholder="Senha" class="w-full mb-3 p-2 border rounded" required />

    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
        Entrar
    </button>
    </form>

    <div class="text-center mt-6 space-y-3">
        <p class="text-sm text-gray-600">Não tem conta?</p>
        <div class="flex justify-center gap-4">
           <button id="btnAluno"
    class="tipo-btn text-blue-500 font-medium hover:underline transition"
    type="button"
    onclick="window.location.href='{{ route('register.aluno') }}'">
    Cadastro Aluno
</button>

<span class="text-gray-400">|</span>

<button id="btnProfessor"
    class="tipo-btn text-green-500 font-medium hover:underline transition"
    type="button"
    onclick="window.location.href='{{ route('register.professor') }}'">
    Cadastro Professor
</button>

        </div>
    </div>
</div>

<script>
    // Função toggle senha
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

    // Elementos botão
    const btnAluno = document.getElementById('btnAluno');
    const btnProfessor = document.getElementById('btnProfessor');
    const tipoInput = document.getElementById('tipo');

    // Função para atualizar visual e valor do tipo
    function setTipo(tipo) {
        tipoInput.value = tipo;

        if(tipo === 'aluno') {
            btnAluno.classList.add('underline');
            btnProfessor.classList.remove('underline');
        } else {
            btnProfessor.classList.add('underline');
            btnAluno.classList.remove('underline');
        }
    }

    // Eventos click
    btnAluno.addEventListener('click', () => setTipo('aluno'));
    btnProfessor.addEventListener('click', () => setTipo('professor'));

    // Inicializa com professor selecionado
    setTipo('professor');
</script>
@endsection
