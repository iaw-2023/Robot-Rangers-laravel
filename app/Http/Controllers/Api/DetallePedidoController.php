<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetallePedidos\StoreDetallePedidoRequest;
use App\Http\Requests\DetallePedidos\UpdateDetallePedidoRequest;
use App\Http\Resources\DetallePedidoResource;
use App\Models\DetallePedido;

class DetallePedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return DetallePedidoResource::collection(DetallePedido::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDetallePedidoRequest $request)
    {
        return new DetallePedidoResource(DetallePedido::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(DetallePedido $detalle_pedido)
    {
        return new DetallePedidoResource($detalle_pedido);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDetallePedidoRequest $request, DetallePedido $detalle_pedido)
    {
        $detalle_pedido->update($request->all());
        return new DetallePedidoResource($detalle_pedido);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetallePedido $detalle_pedido)
    {
        $detalle_pedido->delete();
        return new DetallePedidoResource($detalle_pedido); 
    }
}
