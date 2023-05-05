@extends('layouts.app')

@section('content')
<div class="container">
    @include('messages')

    <div class="col-xl-12">
         <form action = "{{route('categorias.index')}}" method = "GET">
            <div class="form-row">
                <div class="col-sm-4 my-1">
                    <input type = "text" class = "form-control" name = "filtro" value = "{{$filtro}}">
                </div>
                <div class="col-auto ml-auto">
                    <input type = "submit" class = "btn btn-primary" value = "Buscar">
                </div>
            </div>
         </form>
    </div>

    <a href="/categorias/create" class="btn btn-success my-3">Crear categoria</a>
    
    <table class="table border-b border-gray-100 dark:border-gray-700">
        <thead>
            <tr>
            <th scope="col" style="color:white">ID</th>
            <th scope="col" style="color:white">Nombre</th>
            </tr>
        </thead>
        <tbody>
            @if($categorias->count()==0)
                <tr>
                    <td colspan="2" style="color:white"> No se encontraron resultados </td>
                </tr>
            @else
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
            @endif
        </tbody>
    </table>
</div>
{{$categorias->links()}}
@endsection
