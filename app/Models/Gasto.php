<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GastoConcepto;

class Gasto extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'fecha',
        'monto',
        'id_concepto'
    ];

    public function gasto()
    {
        return $this->belongsTo(GastoConcepto::class);
    }
}
