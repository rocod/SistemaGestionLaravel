<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mailing extends Model
{
    use HasFactory;

    protected $fillable = [
        'asunto',
        'cuerpo',
        'archivo_adjunto',
        'posicion',
    ];
}
