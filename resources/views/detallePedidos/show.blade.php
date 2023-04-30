@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card col-6 offset-3">
    <div class="card-header">
        ID = {{$detalle_pedido->id}}
    </div>
    <div class="card-header">
        ID Pedido = {{$detalle_pedido->pedido_id}}
    </div>
    <div class="card-header">
        ID Prenda = {{$detalle_pedido->prenda_id}}
    </div>
    <div class="card-header">
        Cantidad prenda = {{$detalle_pedido->cantidad}}
    </div>
    </div>
</div>
@endsection