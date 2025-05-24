<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::get('/inicio', function () {
    return view('welcome');
})->name('home');

Route::get('/register/aluno', [AuthController::class, 'showRegisterAluno'])->name('register.aluno.form');
Route::post('/register/aluno', [AuthController::class, 'registerAluno'])->name('register.aluno');

Route::get('/register/professor', [AuthController::class, 'showRegisterProfessor'])->name('register.professor.form');
Route::post('/register/professor', [AuthController::class, 'registerProfessor'])->name('register.professor');

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rotas protegidas
Route::middleware('web')->group(function () {
   Route::get('/home/alunos', [AuthController::class, 'showHomeAlunos'])->name('inicio');
});
// Route::middleware(['auth', 'checkRole:aluno'])->get('/aluno/home', fn() => 'Bem-vindo aluno!');
// Route::middleware(['auth', 'checkRole:professor'])->get('/professor/home', fn() => 'Bem-vindo professor!');