<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    public $timestamps = false;

    protected $table = "fornecedores";

    protected $fillable = [
        'nome',
        'cnpj',
        'endereco',
        'telefone',
    ];

    public function livraria(){
        return $this->belongsToMany(Livraria::class);
  }
}
