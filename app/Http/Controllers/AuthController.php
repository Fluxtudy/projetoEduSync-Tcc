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
    $validated = $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|email|unique:professores,email',
        'senha' => 'required|string|confirmed|min:8',
        'telefone' => 'required|string|max:20',
        'area' => 'required|string|max:255',
        'experiencia' => 'required|string|max:255',
        'portfolio' => 'nullable|url|max:255',
        'cv' => 'nullable|file|mimes:pdf|max:2048', 
    ]);

    // Upload do currículo, se enviado
    $curriculoPath = null;
    if ($request->hasFile('cv')) { 
        $curriculoPath = $request->file('cv')->store('curriculos', 'public');
    }

    // Criação do professor
    $professor = Professores::create([
        'nome' => $validated['nome'],
        'email' => $validated['email'],
        'senha' => bcrypt($validated['senha']),
        'telefone' => $validated['telefone'],
        'area_atuacao' => $validated['area'], 
        'experiencia' => $validated['experiencia'],
        'portfolio' => $validated['portfolio'] ?? null,
        'curriculo' => $curriculoPath,
    ]);

    session([
        'user_id' => $professor->id,
        'user_nome' => $professor->nome,
        'user_role' => 'professor',
    ]);

    return redirect()->route('professor.perfil')->with('success', 'Cadastro realizado com sucesso!');
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
    if ($aluno && Hash::check($request->password, $aluno->senha)) {
    session([
        'user_id' => $aluno->id,
        'user_nome' => $aluno->nome,
        'user_role' => 'aluno',
    ]);
    return redirect()->route('aluno.dashboard');
}

    
    $professor = Professores::where('email', $request->email)->first();
    if ($professor && Hash::check($request->password, $professor->senha)) {
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
public function logout(Request $request)
{
    $request->session()->flush(); 
    return redirect('/login')->with('success', 'Logout realizado com sucesso!');
}
}