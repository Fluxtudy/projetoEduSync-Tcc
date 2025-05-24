<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Professores extends Model
{
    use HasFactory;
    
    protected $fillable = ['nome', 'email', 'telefone', 'preco_aula', 'senha'];
}