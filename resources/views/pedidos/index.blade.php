@extends('layouts.app')

@section('content')
<div class="container">
    @include('messages')
    <div class="col-xl-12">
         <form action = "{{route('pedidos.index')}}" method = "GET">
         <div class="input-group align-items-center w-50">
            <input type="text" class="form-control h-100" name="filtro" value="{{$filtro}}">
            <div class="input-group-append">
                <input type="submit" class="btn btn-primary h-100 btn-block ml-5" value="Buscar">
            </div>
        </div>
         </form>
    </div>
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
            @if($pedidos->count()==0)
                <tr>
                    <td colspan="2" style="color:white"> No se encontraron resultados </td>
                </tr>
            @else
                @foreach($pedidos as $pedido)
                <tr>
                    <th scope="row" style="color:white">{{$pedido->id}}</th>
                    <td style="color:white">{{$pedido->mail_cliente}}</td>
                    <td style="color:white">${{$pedido->monto}}</td>
                    <td style="color:white">{{ date('d-m-Y H:i:s', strtotime($pedido->fechaHora)) }}</td>
                    <td>
                        <form action="/pedidos/{{$pedido->id}}" method="POST">
                            @csrf 
                            <a href="/pedidos/{{$pedido->id}}" class="btn btn-success">Ver</a>
                        </form>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{$pedidos->links()}}
</div>
@endsection