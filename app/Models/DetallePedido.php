<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    use HasFactory;
    
    protected $table = 'detallePedidos';

    protected $fillable = [
        'pedido_id',
        'prenda_id',
        'cantidad'
    ];
}
