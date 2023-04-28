<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdateMarcaRequest;
use App\Models\Pedido;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedido::all();
        
        if ($pedidos->count() > 0) {
            return response()->json(['status'=>200,'pedidos'=>$pedidos], 200);
        } else {
            return response()->json(['status'=>404,'No pedidos found.'], 404);
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
    public function store(StorePedidoRequest $request)
    {
        $validator = $request->validate();

        if($validator) {
            Pedido::create([$validator]);
            return response()->json(['status'=>200, 'message'=>'Pedido has been created.'], 200);
        } else {
            return response()->json(['status'=>404, 'message'=>'ERROR: Pedido has not been created.'], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pedido = Pedido::find($id);

        if($pedido){
            return response()->json(['status'=>200, 'pedido'=>$pedido], 200);
        } else {
            return response()->json(['status'=>404, 'message'=> 'Pedido has not found.'], 404);
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
    public function update(UpdateMarcaRequest $request, string $id)
    {
        $validator = $request->validate();
        $pedido = Pedido::find($id);

        if($validator && $pedido) {
            $pedido->update([$validator]);
            return response()->json(['status'=>200, 'message'=>'Pedido has been updated.'], 200);
        } else {
            return response()->json(['status'=>404, 'message'=>'ERROR: Pedido has not been updated.'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pedido = Pedido::find($id);

        if($pedido){
            $pedido->delete();
            return response()->json(['status'=>200, 'message'=>'Pedido has been deleted.'], 200);
        } else {
            return response()->json(['status'=>404, 'message'=>'ERROR: Pedido has not been deleted.'], 404);
        }
    }
}
