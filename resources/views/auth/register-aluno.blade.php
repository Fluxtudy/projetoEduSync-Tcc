@extends('layouts.app')

@section('title', 'Cadastro de Aluno')

@section('content')
<div class="max-w-xl mx-auto bg-white p-8 shadow-lg rounded-lg">
    <h2 class="text-2xl font-bold mb-6 text-center">Cadastro de Aluno</h2>

    <form method="POST" action="{{ route('register.aluno') }}" class="space-y-4">
        @csrf
        <input type="text" name="nome" placeholder="Nome" class="w-full px-4 py-2 border rounded" required>
        <input type="email" name="email" placeholder="E-mail" class="w-full px-4 py-2 border rounded" required>
        <input type="password" name="password" placeholder="Senha" class="w-full px-4 py-2 border rounded" required>
        <input type="password" name="password_confirmation" placeholder="Confirmar senha" class="w-full px-4 py-2 border rounded" required>
        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
            Cadastrar
        </button>
    </form>

    <div class="text-center mt-4">
        <a href="{{ route('login.form') }}" class="text-blue-500 hover:underline">Já tem conta? Entrar</a>
    </div>
</div>
@endsection