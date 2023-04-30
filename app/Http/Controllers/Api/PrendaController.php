<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PrendaResource;
use App\Models\Prenda;

class PrendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PrendaResource::collection(Prenda::all());
    }


    /**
     * Display the specified resource.
     */
    public function show(Prenda $prenda)
    {
        return new PrendaResource($prenda);
    }

}
