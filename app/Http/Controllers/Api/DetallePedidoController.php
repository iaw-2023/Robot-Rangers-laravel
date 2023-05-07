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

}
