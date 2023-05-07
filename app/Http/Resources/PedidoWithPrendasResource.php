<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PedidoWithPrendasResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            'mail_cliente' => $this->mail_cliente,
            'monto' => $this->monto,
            'fechaHora' => $this->fechaHora,
            'prendas' => $this->prendas->map(function ($prenda) {
                return [
                    'id' => $prenda->id,
                    'nombre' => $prenda->nombre,
                    'cantidad' => $prenda->pivot->cantidad,
                ];
            }),
        ];
    }
}