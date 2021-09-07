<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subsubcategoria extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'opcion', 
        'relacion', 
        'orden',       
    ];
}
