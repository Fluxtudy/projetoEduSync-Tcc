<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreLoginRequest;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    public function home(){

        return view('home');

    }
    public function index(){

        return view('login');

    }

   public function authenticate(StoreLoginRequest $request)
{
    $credentials = $request->only('email', 'password');
    $tipo = $request->input('tipo'); // aluno ou professor

    if ($tipo === 'professor') {
        if (Auth::guard('professor')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
    } elseif ($tipo === 'aluno') {
        if (Auth::guard('aluno')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home-aluno');
        }
    }

    return back()->withErrors([
        'email' => 'Credenciais incorretas.',
    ])->withInput();
}


    // public function loginAluno(StoreLoginRequest $request)
    // {
    // $credentials = $request->only('email', 'password');

    // if (Auth::guard('aluno')->attempt($credentials)) {
    //     $request->session()->regenerate();
    //     return redirect()->route('home.aluno'); 
    // }

    // return back()->withErrors([
    //     'email' => 'As credenciais estão incorretas.',
    // ]);
    // }

     public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
