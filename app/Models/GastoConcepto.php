<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gasto;

class GastoConcepto extends Model
{
    use HasFactory;

    protected $fillable = [
        'concepto',
        'estado'
    ];

    public function gastos()
    {
        return $this->hasMany(Gasto::class);
    }
}
