@extends('layouts.app')

@section('content')
<div class="container">
    @include('messages')
    <a href="/prendas/create" class="btn btn-success">Crear prenda</a>
    <table class="table border-b border-gray-100 dark:border-gray-700">
        <thead>
            <tr>
            <th scope="col" style="color:white">ID</th>
            <th scope="col" style="color:white">Nombre</th>
            <th scope="col" style="color:white">ID Marca</th>
            <th scope="col" style="color:white">ID Categoria</th>
            <th scope="col" style="color:white">Talle</th>
            <th scope="col" style="color:white">Color</th>
            <th scope="col" style="color:white">Imagen</th>
            <th scope="col" style="color:white">Precio</th>
            <th scope="col" style="color:white">Descripcion</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prendas as $prenda)
            <tr>
                <th scope="row" style="color:white">{{$prenda->id}}</th>
                <td style="color:white">{{$prenda->nombre}}</td>
                <td style="color:white">{{$prenda->marca_id}}</td>
                <td style="color:white">{{$prenda->categoria_id}}</td>
                <td style="color:white">{{$prenda->talle}}</td>
                <td style="color:white">{{$prenda->color}}</td>
                <td style="color:white"> <a href="{{$prenda->imagen}}">Link</a></td>
                <td style="color:white">{{$prenda->precio}}</td>
                <td style="color:white">{{$prenda->descripcion}}</td>
                <td>
                    <form action="/prendas/{{$prenda->id}}" method="POST">
                        @method('DELETE')
                        @csrf 
                        <a href="/prendas/{{$prenda->id}}" class="btn btn-success">Ver</a>
                        <a href="/prendas/{{$prenda->id}}/edit" class="btn btn-success">Editar</a>
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection