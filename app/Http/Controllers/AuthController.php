<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Aluno;
use App\Models\Professores;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    
    public function showRegisterAluno()
    {
        return view('auth.register-aluno');
    }

    
    public function registerAluno(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:alunos,email',
            'telefone' => 'required|string|max:11',
            'password' => 'required|string|confirmed|min:6',
        ]);

        $aluno = Aluno::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'senha' => Hash::make($request->password),
        ]);

        
        session([
            'user_id' => $aluno->id,
            'user_nome' => $aluno->nome,
            'user_role' => 'aluno',
        ]);

        return redirect('login');
    }

    
    public function showRegisterProfessor()
    {
        return view('auth.register-professor');
    }

    
   public function registerProfessor(Request $request)
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|email|unique:professores,email',
        'telefone' => 'required|string|max:20', 
        'preco_aula' => 'required|numeric|min:0', 
        'password' => 'required|string|confirmed|min:8',
    ]);

    $professor = Professores::create([
        'nome' => $request->nome,
        'email' => $request->email,
        'telefone' => $request->telefone,
        'preco_aula' => $request->preco_aula,
        'password' => Hash::make($request->password),
        'perfil_completo' => false 
    ]);

    session([
        'user_id' => $professor->id,
        'user_nome' => $professor->nome,
        'user_role' => 'professor',
    ]);


    
        return redirect()->route('professor.perfil');
}

   
    public function showLoginForm()
    {
        return view('auth.login');
    }

    
public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    
    $aluno = Aluno::where('email', $request->email)->first();
    if ($aluno && Hash::check($request->password, $aluno->password)) {
        session([
            'user_id' => $aluno->id,
            'user_nome' => $aluno->nome,
            'user_role' => 'aluno',
        ]);
        return redirect()->route('aluno.dashboard');
    }

    
    $professor = Professores::where('email', $request->email)->first();
    if ($professor && Hash::check($request->password, $professor->password)) {
        session([
            'user_id' => $professor->id,
            'user_nome' => $professor->nome,
            'user_role' => 'professor',
        ]);

        if (!$professor->perfil_completo) {
            return redirect()->route('professor.perfil')
                ->with('info', 'Complete seu perfil para começar');
        }

        return redirect()->route('professor.dashboard');
    }

    return back()->withErrors([
        'login' => 'Credenciais inválidas',
    ]);
}

}