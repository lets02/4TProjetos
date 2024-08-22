<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aluno extends Authenticatable
{
    use HasFactory;

    // Definição dos atributos que podem ser preenchidos em massa
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Especifica os atributos que devem ser ocultados em arrays (por exemplo, a senha)
    protected $hidden = [
        'password',
    ];

    // Caso você esteja usando a classe de Hashing padrão para senhas
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
