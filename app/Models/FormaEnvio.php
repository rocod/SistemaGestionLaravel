<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaEnvio extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'forma_envio',
        'estado'
    ];
}
