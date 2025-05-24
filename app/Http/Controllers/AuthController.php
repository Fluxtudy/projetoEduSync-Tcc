<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Aluno;
use App\Models\Professores;

class AuthController extends Controller
{
    // Formulario de registro de aluno
    public function showRegisterAluno()
    {
        return view('auth.register-aluno');
    }

    // Registro de aluno
    public function registerAluno(Request $request)
    {
        // dd($request->all());

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

        // Salva na sessão
        session([
            'user_id' => $aluno->id,
            'user_nome' => $aluno->nome,
            'user_role' => 'aluno',
        ]);

        return redirect('login');
    }

    // Formulario de registro de professor
    public function showRegisterProfessor()
    {
        return view('auth.register-professor');
    }

    // Registro de professor
    public function registerProfessor(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:professores,email',
            'telefone' => 'required|string|max:11',
            'preco_aula' => 'required|string|max:11',
            'password' => 'required|string|confirmed|min:6',
        ]);

        $professor = Professores::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'preco_aula' =>$request->preco_aula,
            'password' => Hash::make($request->password),
        ]);

        session([
            'user_id' => $professor->id,
            'user_nome' => $professor->nome,
            'user_role' => 'professor',
        ]);

        return redirect('/professor/home');
    }

    // Formulário de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Login unificado
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Verifica se é aluno
        $aluno = Aluno::where('email', $request->email)->first();
        if ($aluno && Hash::check($request->password, $aluno->senha)) {
            session([
                'user_id' => $aluno->id,
                'user_nome' => $aluno->nome,
                'user_role' => 'aluno',
            ]);
            return redirect('/inicio');
        }

        

        // Verifica se é professor
        // $professor = Professor::where('email', $request->email)->first();
        // if ($professor && Hash::check($request->password, $professor->senha)) {
        //     session([
        //         'user_id' => $professor->id,
        //         'user_nome' => $professor->nome,
        //         'user_role' => 'professor',
        //     ]);
        //     return redirect('/professor/home');
        // }

        return back()->withErrors([
            'email' => 'Credenciais inválidas',
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }
}