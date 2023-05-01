@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card col-6 offset-3">
    <div class="card-header">
        Mail Cliente = {{$pedido->mail_cliente}}
    </div>
    <div class="card-header">
        Monto = {{$pedido->monto}}
    </div>
    <div class="card-header">
        Fecha = {{$pedido->fecha}}
    </div>
    </div>
</div>
@endsection