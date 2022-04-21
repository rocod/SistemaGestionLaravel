<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaRma extends Model
{
    use HasFactory;

    protected $fillable = [
        'forma_rma',
        'estado'
    ];
}
