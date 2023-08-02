<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Midia extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'titulo',
        'tipo',
        'avaliacao',
    ];
}
