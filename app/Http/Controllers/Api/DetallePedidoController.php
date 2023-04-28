<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDetallePedidoRequest;
use App\Http\Requests\UpdateDetallePedidoRequest;
use App\Models\DetallePedido;

class DetallePedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detallePedidos = DetallePedido::all();
        
        if ($detallePedidos->count() > 0) {
            return response()->json(['status'=>200,'detallePedidos'=>$detallePedidos], 200);
        } else {
            return response()->json(['status'=>404,'No detalle pedidos found'], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDetallePedidoRequest $request)
    {
        $validator = $request->validate();

        if($validator) {
            DetallePedido::create([$validator]);
            return response()->json(['status'=>200, 'message'=>'Detalle Pedido has been created.'], 200);
        } else {
            return response()->json(['status'=>404, 'message'=>'ERROR: Detalle pedido has not been created.'], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detallePedido = DetallePedido::find($id);

        if($detallePedido){
            return response()->json(['status'=>200, 'detallePedido'=>$detallePedido], 200);
        } else {
            return response()->json(['status'=>404, 'message'=> 'Detalle pedido has not found.'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDetallePedidoRequest $request, string $id)
    {
        $validator = $request->validate();
        $detallePedido = DetallePedido::find($id);

        if($validator && $detallePedido) {
            $detallePedido->update([$validator]);
            return response()->json(['status'=>200, 'message'=>'Detalle Pedido has been updated.'], 200);
        } else {
            return response()->json(['status'=>404, 'message'=>'ERROR: Detalle Pedido has not been updated.'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detallePedido = DetallePedido::find($id);

        if($detallePedido){
            $detallePedido->delete();
            return response()->json(['status'=>200, 'message'=>'Detalle pedido has been deleted.'], 200);
        } else {
            return response()->json(['status'=>404, 'message'=>'ERROR: Detalle pedido has not been deleted.'], 404);
        }
    }
}
