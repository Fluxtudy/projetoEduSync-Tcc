<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Professores;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Professores extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'preco_aula',
        'password',
        'biografia',
        'especializacao',
        'areas_atuacao',
        'linkedin',
        'youtube',
        'foto_perfil',
        'perfil_completo'
    ];

    protected $casts = [
        'areas_atuacao' => 'array',
        'perfil_completo' => 'boolean'
    ];
}