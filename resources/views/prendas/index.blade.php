@extends('layouts.app')

@section('content')
<div class="container">
    @include('messages')
    <div class="col-xl-12">
         <form action = "{{route('prendas.index')}}" method = "GET">
         <div class="input-group align-items-center w-50">
            <input type="text" class="form-control h-100" name="filtro" value="{{$filtro}}">
            <div class="input-group-append">
                <input type="submit" class="btn btn-primary h-100 btn-block ml-5" value="Buscar">
            </div>
        </div>
         </form>
    </div>
    <a href="/prendas/create" class="btn btn-success my-3">Crear prenda</a>
    <table class="table border-b border-gray-100 dark:border-gray-700">
        <thead>
            <tr>
            <th scope="col" style="color:white">ID</th>
            <th scope="col" style="color:white">Nombre</th>
            <th scope="col" style="color:white">Talle</th>
            <th scope="col" style="color:white">Color</th>
            <th scope="col" style="color:white">Imagen</th>
            <th scope="col" style="color:white">Precio</th>
            </tr>
        </thead>
        <tbody>
            @if($prendas->count()==0)
                <tr>
                    <td colspan="2" style="color:white"> No se encontraron resultados </td>
                </tr>
            @else
                @foreach($prendas as $prenda)
                <tr>
                    <th scope="row" style="color:white">{{$prenda->id}}</th>
                    <td style="color:white">{{$prenda->nombre}}</td>
                    <td style="color:white">{{$prenda->talle}}</td>
                    <td><span style="display: inline-block; width: 20px; height: 20px; background-color: {{$prenda->color}}; margin-right: 5px;"></span></td>
                    <td style="color:white"> <a href="{{$prenda->imagen}}">Link</a></td>
                    <td style="color:white">${{$prenda->precio}}</td>
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
            @endif
        </tbody>
    </table>
    {{$prendas->links()}}
</div>
@endsection