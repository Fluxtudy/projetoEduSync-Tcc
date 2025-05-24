@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 shadow-lg rounded-lg">
    <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

    <form action="{{ route('login') }}" method="POST" class="space-y-4">
        @csrf
        <input type="email" name="email" placeholder="E-mail" class="w-full px-4 py-2 border rounded" required>
        <input type="password" name="password" placeholder="Senha" class="w-full px-4 py-2 border rounded" required>

        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
            Entrar
        </button>
    </form>

    <div class="text-center mt-4 space-y-2">
        <p class="text-sm">Não tem conta?</p>
        <a href="{{ route('register.aluno.form') }}" class="text-blue-500 hover:underline">Cadastrar como Aluno</a><br>
        <a href="{{ route('register.professor.form') }}" class="text-green-500 hover:underline">Cadastrar como Professor</a>
    </div>
</div>
@endsection