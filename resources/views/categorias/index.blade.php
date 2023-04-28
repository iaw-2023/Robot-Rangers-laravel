@extends('layouts.app')

@section('content')
<div class="container">
    @include('messages')
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <th scope="row">{{$categoria->id}}</th>
                <td>{{$categoria->nombre}}</td>
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
