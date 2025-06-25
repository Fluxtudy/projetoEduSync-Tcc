<?php

namespace App\Http\Controllers;

use App\Models\Alunos;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAlunosRequest;
use App\Http\Requests\UpdateAlunosRequest;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home-aluno');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('register.aluno');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlunosRequest $request)
    {
       
        $aluno = Alunos::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'password' => Hash::make($request->password),
        ]);

       return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso! Faça login.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Alunos $alunos)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alunos $alunos)
    {
        $alunos = auth()->guard('aluno')->user()->fresh();
    return view('editar-aluno', compact('alunos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlunosRequest $request)
    {
        $alunos = auth()->guard('aluno')->user();
        $alunos->update($request->only('nome', 'email', 'telefone'));

        $alunos->refresh();

        return redirect()->route('editar-aluno')->with('success', 'Perfil atualizado com sucesso!');

    }

    /**     
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $aluno = Alunos::findOrFail($id);

        Auth::guard('aluno')->logout(); 
        $aluno->delete();               

        return redirect('/login')->with('success', 'Seu perfil foi excluído com sucesso.');
    }
}
