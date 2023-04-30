<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pedidos\StorePedidoRequest;
use App\Http\Requests\Pedidos\UpdatePedidoRequest;
use App\Http\Resources\PedidoResource;
use App\Models\Pedido;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PedidoResource::collection(Pedido::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePedidoRequest $request)
    {
        return new PedidoResource(Pedido::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        return new PedidoResource($pedido);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePedidoRequest $request, Pedido $pedido)
    {
        $pedido->update($request->all());
        return new PedidoResource($pedido);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return new PedidoResource($pedido); 
    }
}
