<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoriaResource;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CategoriaResource::collection(Categoria::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        return new CategoriaResource($categoria);
    }
}
