@extends('layouts.app')

@section('content')
<div class="container">
    @include('messages')
    <a href="/categorias/create" class="btn btn-success">Crear categoria</a>
    <table class="table border-b border-gray-100 dark:border-gray-700">
        <thead>
            <tr>
            <th scope="col" style="color:white">ID</th>
            <th scope="col" style="color:white">Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <th scope="row" style="color:white">{{$categoria->id}}</th>
                <td style="color:white">{{$categoria->nombre}}</td>
                <td>
                    <form action="/categorias/{{$categoria->id}}" method="POST">
                        @method('DELETE')
                        @csrf 
                        <a href="/categorias/{{$categoria->id}}" class="btn btn-success">Ver</a>
                        <a href="/categorias/{{$categoria->id}}/edit" class="btn btn-success">Editar</a>
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
