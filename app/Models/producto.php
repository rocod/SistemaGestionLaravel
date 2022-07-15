<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

     protected $fillable = [
        'categoria_id',
        'subcategoria_id',
        'subsubcategoria_id',
        'nombre',
        'codigo',
        'precio',
        'costo',
        'costo_dolar',
        'precio_may',
        'descripcion',
        'imagen1',
        'imagen2',
        'imagen3',
        'imagen4',
        'video',
        'destacado',
        'producto_estado_id',
        'precio_5',
        'precio_10',
        'precio_50',
        'stock',
        'stock_deposito',
        'codigo_barras',
        'precio_td',
        'fecha_td',
        'secundario',

    ];
}

