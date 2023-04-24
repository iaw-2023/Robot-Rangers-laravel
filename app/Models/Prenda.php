<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'marca_id',
        'categoria_id',
        'talle',
        'color',
        'imagen',
        'precio',
        'descripcion',
    ];
}
