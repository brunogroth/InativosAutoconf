<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'url',
        'status',
        'data_inicial',
        'data_final',
        'tempo_ate_expirar',
    ];
}
