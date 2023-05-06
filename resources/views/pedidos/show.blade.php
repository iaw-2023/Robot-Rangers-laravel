@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card col-6 offset-3">
    <div class="card-header show">
        Mail Cliente = {{$pedido->mail_cliente}}
    </div>
    <div class="card-header show">
        Monto = ${{$pedido->monto}}
    </div>
    <div class="card-header show">
        Fecha = {{$pedido->fecha}}
    </div>
    @foreach ($pedido->prendas as $index => $prenda)
        <div class="card-header show">
            <div>
                <h4>Prenda {{ $index + 1 }}: {{ $prenda->nombre }}</h4>
                <p>Precio: ${{ $prenda->precio }}</p>
                <p>Cantidad: {{ $prenda->pivot->cantidad }}</p>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection