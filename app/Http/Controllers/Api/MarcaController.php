<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MarcaResource;
use App\Models\Marca;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return MarcaResource::collection(Marca::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Marca $marca)
    {
        return new MarcaResource($marca);
    }

}
