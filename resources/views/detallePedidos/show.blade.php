@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card col-6 offset-3">
    <div class="card-header">
        ID = {{$detallePedido->id}}
    </div>
    <div class="card-header">
        ID Pedido = {{$detallePedido->pedido_id}}
    </div>
    <div class="card-header">
        ID Prenda = {{$detallePedido->prenda_id}}
    </div>
    <div class="card-header">
        Cantidad prenda = {{$detallePedido->cantidad}}
    </div>
    </div>
</div>
@endsection