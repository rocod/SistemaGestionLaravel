<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\productos;
use App\Models\User;

class Opinione extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_usuario',
        // 'id_producto',
        'producto',
        'puntaje',
        'opinion',
        'estado'
    ];

    // public function producto()
    // {
    //     return $this->belongsTo(productos::class);
    // }

    public function user()
    {
        return $this->belongsTo(user::class, 'id_usuario');
    }

    public function getGetResumenAttribute()
    {
        return substr($this->opinion, 0, 50);
    }
}
