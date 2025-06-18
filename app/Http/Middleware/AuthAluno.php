<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\Kernel;

class AuthAluno
{
    public function handle(Request $request, Closure $next)
    {
        if (session('user_role') !== 'aluno') {
            return redirect('/login')->with('error', 'Acesso restrito.');
        }
        return $next($request);
    }
}