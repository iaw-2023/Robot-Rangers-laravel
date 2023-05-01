@extends('layouts.app')

@section('content')
<div class="container">
    @include('messages')
    <table class="table border-b border-gray-100 dark:border-gray-700">
        <thead>
            <tr>
            <th scope="col" style="color:white">ID</th>
            <th scope="col" style="color:white">Mail Cliente</th>
            <th scope="col" style="color:white">Monto</th>
            <th scope="col" style="color:white">Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
            <tr>
                <th scope="row" style="color:white">{{$pedido->id}}</th>
                <td style="color:white">{{$pedido->mail_cliente}}</td>
                <td style="color:white">${{$pedido->monto}}</td>
                <td style="color:white">{{$pedido->fecha}}</td>
                <td>
                    <form action="/pedidos/{{$pedido->id}}" method="POST">
                        @csrf 
                        <a href="/pedidos/{{$pedido->id}}" class="btn btn-success">Ver</a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection