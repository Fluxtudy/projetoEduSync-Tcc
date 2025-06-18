<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professores;
use Illuminate\Support\Facades\Storage;

class ProfessorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.professor'); 
    }

    public function home()
{
    
    $professor = Professores::find(session('user_id'));
    
    if (!$professor) {
        return redirect('/login')->with('error', 'Professor não encontrado');
    }
    
    if (!$professor->perfil_completo) {
        return redirect()->route('professor.perfil')
            ->with('warning', 'Complete seu perfil antes de continuar');
    }

    
    return view('professor.home', compact('professor'));
}

    public function editarPerfil()
    {
        $professor = Professores::find(session('user_id'));
        $areas = ['Programação', 'Design', 'Ciência de Dados', 'Marketing Digital', 'Inglês'];
        
        return view('professor.perfil', compact('professor', 'areas'));
    }

    public function atualizarPerfil(Request $request)
    {
        $professor = Professores::find(session('user_id'));
        
        $request->validate([
            'biografia' => 'required|string|min:50|max:2000',
            'especializacao' => 'required|string|max:100',
            'areas_atuacao' => 'required|array|min:1',
            'linkedin' => 'nullable|url',
            'youtube' => 'nullable|url',
            'foto_perfil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('foto_perfil', 'areas_atuacao');
        $data['areas_atuacao'] = json_encode($request->areas_atuacao);
        
        if ($request->hasFile('foto_perfil')) {
            $path = $request->file('foto_perfil')->store('professores/perfil', 'public');
            $data['foto_perfil'] = $path;
            
            if ($professor->foto_perfil) {
                Storage::disk('public')->delete($professor->foto_perfil);
            }
        }
        
        $data['perfil_completo'] = true;
        $professor->update($data);

        return redirect()->route('professor.home')
            ->with('success', 'Perfil atualizado com sucesso!');
    }
}