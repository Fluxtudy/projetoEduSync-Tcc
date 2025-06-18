<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\AlunoController;
use Illuminate\Support\Facades\Route;

// Rotas públicas
Route::get('/', function () {
    return view('inicio');
})->name('home');

// Registro
Route::get('/register/aluno', [AuthController::class, 'showRegisterAluno'])->name('register.aluno.form');
Route::post('/register/aluno', [AuthController::class, 'registerAluno'])->name('register.aluno');

Route::get('/register/professor', [AuthController::class, 'showRegisterProfessor'])->name('register.professor.form');
Route::post('/register/professor', [AuthController::class, 'registerProfessor'])->name('register.professor');

// Autenticação
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rotas do Aluno
Route::middleware(['auth', 'checkRole:aluno'])->prefix('aluno')->group(function () {
    Route::get('/dashboard', [AlunoController::class, 'dashboard'])->name('aluno.dashboard');
    Route::get('/cursos', [AlunoController::class, 'cursos'])->name('aluno.cursos');
    Route::get('/professores/{curso}', [AlunoController::class, 'professores'])->name('aluno.professores');
});

// Rotas do Professor
Route::middleware(['auth', 'checkRole:professor'])->prefix('professor')->group(function () {
    Route::get('/dashboard', [ProfessorController::class, 'dashboard'])->name('professor.dashboard');
    
    // Perfil do Professor
    Route::get('/perfil', [ProfessorController::class, 'editarPerfil'])->name('professor.perfil');
    Route::post('/perfil', [ProfessorController::class, 'atualizarPerfil'])->name('professor.perfil.update');
    
    // Perfil público (acessível sem autenticação)
    Route::get('/perfil/{id}', [ProfessorController::class, 'mostrarPerfilPublico'])
         ->name('professor.perfil.publico');
});

// Rota fallback (opcional)
Route::fallback(function () {
    return redirect()->route('home');
});