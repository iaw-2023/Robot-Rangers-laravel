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
     * Display all the resources of a client.
     */
    public function showAll(string $mail_cliente)
    {
        $pedidos = Pedido::where('mail_cliente', $mail_cliente)->get();
        return PedidoResource::collection($pedidos);
    }

}
