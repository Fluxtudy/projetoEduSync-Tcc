<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professores;

class AlunoController extends Controller
{
    public function dashboard()
{
    $cursos = [
        'programacao' => 'Programação',
        'design' => 'Design',
        'dados' => 'Ciência de Dados'
    ];
    
    return view('aluno.dashboard', compact('cursos'));
}

    public function mostrarProfessores($curso)
    {
        $professores = Professores::where('perfil_completo', true)
            ->whereJsonContains('areas_atuacao', $curso)
            ->get();
            
        $tituloCurso = [
            'programacao' => 'Programação',
            'design' => 'Design',
            'dados' => 'Ciência de Dados'
        ][$curso] ?? 'Curso Desconhecido';
        
        return view('aluno.professores', compact('professores', 'tituloCurso', 'curso'));
    }
}