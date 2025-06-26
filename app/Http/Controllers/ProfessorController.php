<?php

namespace App\Http\Controllers;

use App\Models\Professores;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProfessorRequest;
use App\Http\Requests\UpdateProfessorRequest;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $professor = auth()->user(); 
        return view('dashboard', compact('professor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view('register.professor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfessorRequest $request)
    {
        $validated = $request->validated();
        
        $professor = Professores::create([
        'nome' => $validated['nome'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
        'telefone' => $validated['telefone'],
        'area_atuacao' => $validated['area'], 
        'descricao' => $validated['descricao'],
        'portfolio' => $validated['portfolio'] ?? null,
        'github' => $validated['github'] ?? null,
        ]);

        return redirect()->route('login')->with('sucess','usuário criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Professor $professor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Professor $professor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfessorRequest $request, Professores $professor)
    {
        // Validação dos dados
    $validated = $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:professores,email,' . $professor->id,
        'telefone' => 'nullable|string|max:20',
        'area_atuacao' => 'nullable|string|max:255',
        'descricao' =>'nullable|string|max:3000',
        'anos_experiencia' => 'nullable|string|integer|min:1',
        'portfolio' => 'nullable|url|max:255',
    ]);

     $professor->update($validated);

    return redirect()->route('dashboard')->with('success', 'Perfil atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      
         $professor = Professores::findOrFail($id);

        Auth::guard('professor')->logout(); 
        $professor->delete();               

        return redirect('/login')->with('success', 'Seu perfil foi excluído com sucesso.');
    
    }
}
