<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\StorePedidoRequest;
use Illuminate\Http\UpdatePedidoRequest;
use App\Models\Pedido;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pedidos.index', ['pedidos'=>Pedido::orderBy('id')->get()]);    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pedidos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePedidoRequest $request)
    {
        Pedido::create([$request->validated()]);
        return redirect(route('pedidos.index'))->with('message', 'Pedido has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('pedidos.show', ['pedidos', Pedido::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pedidos.edit',['pedidos' => Pedido::where('id', $id)->first()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePedidoRequest $request, string $id)
    {
        Pedido::where('id', $id)->update(validated());
        return redirect(route('pedidos.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pedido::destroy($id);
        return redirect(route('pedidos.index'))->with('message', 'Pedido has been deleted.');
    }
}
