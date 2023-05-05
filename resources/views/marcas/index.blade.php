@extends('layouts.app')

@section('content')
<div class="container">
    @include('messages')
    <div class="col-xl-12">
         <form action = "{{route('marcas.index')}}" method = "GET">
         <div class="input-group align-items-center w-50">
            <input type="text" class="form-control h-100" name="filtro" value="{{$filtro}}">
            <div class="input-group-append">
                <input type="submit" class="btn btn-primary h-100 btn-block ml-5" value="Buscar">
            </div>
        </div>
         </form>
    </div>
    <a href="/marcas/create" class="btn btn-success my-3">Crear marca</a>
    <table class="table border-b border-gray-100 dark:border-gray-700">
        <thead>
            <tr>
            <th scope="col" style="color:white">ID</th>
            <th scope="col" style="color:white">Nombre</th>
            <th scope="col" style="color:white">Imagen</th>
            </tr>
        </thead>
        <tbody>
            @if($marcas->count()==0)
                <tr>
                    <td colspan="2" style="color:white"> No se encontraron resultados </td>
                </tr>
            @else
                @foreach($marcas as $marca)
                <tr>
                    <th scope="row" style="color:white">{{$marca->id}}</th>
                    <td style="color:white">{{$marca->nombre}}</td>
                    <td style="color:white"> <a href="{{$marca->imagen}}">Link</a> </td>
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
            @endif
        </tbody>
    </table>
    {{$marcas->links()}}
</div>
@endsection