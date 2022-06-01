<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosContacto extends Model
{
    use HasFactory;

    protected $fillable = [
        'seccion',
        'linea1',
        'linea2',
        'linea3',
        'linea4',
    ];
}
