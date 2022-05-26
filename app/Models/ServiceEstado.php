<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceEstado extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado',
        'mensaje',
        'state'
    ];
}
