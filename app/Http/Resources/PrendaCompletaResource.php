<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PrendaCompletaResource extends JsonResource
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
            'nombre' => $this->nombre,
            'marca' => new MarcaResource($this->marca),
            'categoria' => new CategoriaResource($this->categoria),
            'talle' => $this->talle,
            'color' => $this->color,
            'imagen' => $this->imagen,
            'precio' => $this->precio,
            'descripcion' => $this->descripcion,
        ];
    }
}
