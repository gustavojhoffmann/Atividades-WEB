<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livros extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'titulo',
        'qtd_paginas',
        'autor',
        'ano_publicacao',
        'genero'
    ];

    public function livraria(){
        return $this->belongsToMany(Livraria::class);
    }
}
