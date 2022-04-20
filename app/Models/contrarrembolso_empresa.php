<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ContrarrebolsoEstado;

class contrarrembolso_empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'telefono',
        'email',
        'direccion',
        'estado'
    ];

    public function estado()
    {
        return $this->belongsTo(ContrarrebolsoEstado::class);
    }
}
