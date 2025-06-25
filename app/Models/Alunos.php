<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Alunos extends Authenticatable
{
     protected $table = 'alunos';

    protected $fillable = [
        'id',
        'nome',
        'email',
        'password',
        'telefone',
    ];
        protected $hidden = [
        'password',
    ];

}
