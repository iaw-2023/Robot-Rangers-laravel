@extends('layouts.app')

@section('content')
<div class="container">
    @include('messages')
    <a href="/marcas/create" class="btn btn-success">Crear marca</a>
    <table class="table border-b border-gray-100 dark:border-gray-700">
        <thead>
            <tr>
            <th scope="col" style="color:white">ID</th>
            <th scope="col" style="color:white">Nombre</th>
            <th scope="col" style="color:white">Imagen</th>
            <th scope="col" style="color:white">Descripcion</th>
            </tr>
        </thead>
        <tbody>
            @foreach($marcas as $marca)
            <tr>
                <th scope="row" style="color:white">{{$marca->id}}</th>
                <td style="color:white">{{$marca->nombre}}</td>
                <td style="color:white"> <a href="{{$marca->imagen}}">Link</a> </td>
                <td style="color:white">{{$marca->descripcion}}</td>
                <td>
                    <form action="/marcas/{{$marca->id}}" method="POST">
                        @method('DELETE')
                        @csrf 
                        <a href="/marcas/{{$marca->id}}" class="btn btn-success">Ver</a>
                        <a href="/marcas/{{$marca->id}}/edit" class="btn btn-success">Editar</a>
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection