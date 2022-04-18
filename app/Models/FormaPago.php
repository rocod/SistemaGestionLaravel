<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaPago extends Model
{
    use HasFactory;

    protected $fillable = [
        'forma_pago',
        'provincia',
        'localidad',
        'cp',
        'direccion',
        'telefono',
        'estado'
    ];
}
