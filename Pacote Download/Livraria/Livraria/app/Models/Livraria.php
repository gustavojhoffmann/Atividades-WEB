<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livraria extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'nome_fantasia',
        'razao_social',
        'endereco',
        'cnpj',
        'telefone',
    ];

    public function fornecedor(){
        return $this->belongsToMany(Fornecedor::class);
    }

    public function livros(){
        return $this->belongsToMany(Livros::class);
    }
}
