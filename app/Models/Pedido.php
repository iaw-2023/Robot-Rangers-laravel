<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prenda;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';
    
    protected $fillable = [
        'mail_cliente',
        'monto',
        'fecha',
    ];

    public function prendas(){
        return $this->belongsToMany(Prenda::class, 'detalle_pedidos')
                    ->withTrashed()
                    ->withPivot('cantidad');
    }
}
