@extends('layouts.app')

@section('content')
<div class="container">
    @include('messages')
    <div class="col-xl-12">
         <form action = "{{route('categorias.index')}}" method = "GET">
         <div class="input-group align-items-center w-50">
            <input type="text" class="form-control h-100" name="filtro" value="{{$filtro}}">
            <div class="input-group-append">
                <input type="submit" class="btn btn-primary h-100 btn-block ml-5" value="Buscar">
            </div>
        </div>
         </form>
    </div>
    <a href="/categorias/create" class="btn btn-success my-3">Crear categoria</a>
    <table class="table border-b border-gray-100 dark:border-gray-700">
        <thead>
            <tr>
            <th scope="col" class="col">ID</th>
            <th scope="col" class="col">Nombre</th>
            </tr>
        </thead>
        <tbody>
            @if($categorias->count()==0)
                <tr>
                    <td colspan="2" class="text-white"> No se encontraron resultados </td>
                </tr>
            @else
                @foreach($categorias as $categoria)
                <tr>
                    <th scope="row" class="text-white">{{$categoria->id}}</th>
                    <td class="text-white">{{$categoria->nombre}}</td>
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
    {{$categorias->links()}}
</div>
@endsection
