@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card col-6 offset-3">
        <div class="card-header text-center text-black">
            <h2>Pedido {{$pedido->id}}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h5>Información del Cliente:</h5>
                    <p><strong>Mail:</strong> {{$pedido->mail_cliente}}</p>
                </div>
                <div class="col-6 text-right">
                    <h5>Dia: {{$pedido->created_at->format('d/m/Y')}} </h5>
                    <h5>Hora: {{$pedido->created_at->format('H:i:s')}} </h5>
                </div>
            </div>
            <table class="table table-bordered text-center mt-4">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Importe</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedido->prendas as $index => $prenda)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$prenda->nombre}}</td>
                            <td>{{$prenda->pivot->cantidad}}</td>
                            <td>${{$prenda->precio}}</td>
                            <td>${{$prenda->precio * $prenda->pivot->cantidad}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" class="text-right"><strong>Total:</strong></td>
                        <td>${{$pedido->monto}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
