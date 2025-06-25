<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CatalogoController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('home', [LoginController::class, 'home'])->name('home');
Route::get('/cadastro', [ProfessorController::class, 'create'])->name('register.professor');
Route::post('/cadastro', [ProfessorController::class, 'store'])->name('register.professor');

Route::get('/aluno', [AlunoController::class, 'create'])->name('register.aluno');
Route::post('/aluno', [AlunoController::class, 'store'])->name('register.aluno');

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

Route::get('login/aluno', [LoginController::class, 'index'])->name('login');

Route::middleware('auth:professor')->group(function(){
    Route::get('dashboard', [ProfessorController::class, 'index'])->name('dashboard');
    Route::put('professor/{professor}', [ProfessorController::class, 'update'])->name('professor.update');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::delete('professor/{id}', [ProfessorController::class, 'destroy'])->name('professor.destroy');
});

Route::middleware('auth:aluno')->group(function(){
    Route::get('home/aluno', [AlunoController::class, 'index'])->name('home-aluno');
    Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo');

    Route::get('perfil', [AlunoController::class, 'edit'])->name('editar-aluno');
    Route::put('perfil', [AlunoController::class, 'update'])->name('editar-aluno');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::delete('aluno/{id}', [AlunoController::class, 'destroy'])->name('aluno.destroy');
   
});