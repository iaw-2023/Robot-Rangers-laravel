<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDetallePedidoRequest;
use App\Http\Requests\UpdateDetallePedidoRequest;
use App\Models\DetallePedido;

class DetallePedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('detallePedidos.index', ['detallePedidos'=>DetallePedido::all()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('detallePedidos.show', ['detallePedidos', DetallePedido::findOrFail($id)]);
    }
}
