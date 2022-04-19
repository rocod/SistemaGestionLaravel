<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\contrareembolso_empresas;

class ContrarrebolsoEstado extends Model
{
    use HasFactory;

    public function contrareembolso_empresas()
    {
        return $this->hasMany(contrareembolso_empresas::class);
    }
}
