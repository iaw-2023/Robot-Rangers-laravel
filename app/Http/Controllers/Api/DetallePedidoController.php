<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetallePedido;
use App\Models\Pedido;
use App\Http\Requests\DetallePedidos\StoreDetallePedidoRequest;
use App\Http\Resources\DetallePedidoResource;

class DetallePedidoController extends Controller
{

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
     * Display all the resources of an order.
     */
    public function showAll(Pedido $pedido)
    {
        $detalle_pedidos = DetallePedido::where('pedido_id', $pedido->id)->get();
        return DetallePedidoResource::collection($detalle_pedidos);
    }

}
