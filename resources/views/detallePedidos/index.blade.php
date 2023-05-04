@extends('layouts.app')

@section('content')
<div class="container">
    @include('messages')
    <table class="table border-b border-gray-100 dark:border-gray-700">
        <thead>
            <tr>
            <th scope="col" style="color:white">ID</th>
            <th scope="col" style="color:white">Pedido id</th>
            <th scope="col" style="color:white">Prenda id</th>
            <th scope="col" style="color:white">Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detallePedidos as $detallePedido)
            <tr>
                <th scope="row" style="color:white">{{$detallePedido->id}}</th>
                <td style="color:white">{{$detallePedido->pedido_id}}</td>
                <td style="color:white">{{$detallePedido->prenda_id}}</td>
                <td style="color:white">{{$detallePedido->cantidad}}</td>
                <td>
                    <form action="/detallePedidos/{{$detallePedido->id}}" method="POST">
                        @csrf 
                        <a href="/detallePedidos/{{$detallePedido->id}}" class="btn btn-success">Ver</a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
