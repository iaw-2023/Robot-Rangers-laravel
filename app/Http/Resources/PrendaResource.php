<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PrendaResource extends JsonResource
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
            'nombre' => $this->nombre,
            'marca' => $this->marca->only(['id', 'nombre']),
            'categoria' => $this->categoria->only(['id', 'nombre']),
            'talle' => $this->talle,
            'color' => $this->color,
            'imagen' => $this->imagen,
            'precio' => $this->precio,
            'descripcion' => $this->descripcion,
        ];
    }
}
