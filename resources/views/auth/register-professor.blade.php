@extends('layouts.app')

@section('title', 'Cadastro de Professor')

@section('content')
<div class="max-w-xl mx-auto bg-white p-8 shadow-lg rounded-lg">
    <h2 class="text-2xl font-bold mb-6 text-center">Cadastro de Professor</h2>

    <form method="POST" action="{{ route('register.professor') }}" class="space-y-4">
        @csrf
        <input type="text" name="nome" placeholder="Nome" class="w-full px-4 py-2 border rounded" required>
        <input type="email" name="email" placeholder="E-mail" class="w-full px-4 py-2 border rounded" required>
        <input type="tel" name="telefone" placeholder="Telefone" class="w-full px-4 py-2 border rounded" required>
        <input type="text" name="preco_aula" placeholder="preco_aula" class="w-full px-4 py-2 border rounded" required>
        <input type="password" name="password" placeholder="Senha" class="w-full px-4 py-2 border rounded" required>
        <input type="password" name="password_confirmation" placeholder="Confirmar senha" class="w-full px-4 py-2 border rounded" required>

        <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
            Cadastrar
        </button>
    </form>

    <div class="text-center mt-4">
        <a href="{{ route('login.form') }}" class="text-green-500 hover:underline">Já tem conta? Entrar</a>
    </div>
</div>
@endsection