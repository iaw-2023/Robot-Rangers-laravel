<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Marca;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prenda extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'prendas';

    protected $fillable = [
        'nombre',
        'marca_id',
        'categoria_id',
        'talle',
        'color',
        'imagen',
        'imagen_public_id',
        'precio',
        'descripcion',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
