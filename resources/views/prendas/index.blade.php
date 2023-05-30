@extends('layouts.app')

@section('content')
<div class="container">
    @include('messages')
    <div class="col-xl-12">
         <form action = "{{route('prendas.index')}}" method = "GET">
         <div class="input-group align-items-center w-50">
            <input type="text" class="form-control h-100" name="filtro" value="{{$filtro}}">
            <div class="input-group-append">
                <input type="submit" class="btn btn-primary h-100 btn-block ml-3" value="Buscar">
            </div>
        </div>
         </form>
    </div>
    <a href="/prendas/create" class="btn btn-success my-3">Crear prenda</a>
    <table class="table border-b border-gray-100 dark:border-gray-700">
        <thead>
            <tr>
            <th scope="col" class="col">ID</th>
            <th scope="col" class="col">Nombre</th>
            <th scope="col" class="col">Talle</th>
            <th scope="col" class="col">Color</th>
            <th scope="col" class="col">Precio</th>
            </tr>
        </thead>
        <tbody>
            @if($prendas->count()==0)
                <tr>
                    <td colspan="2" class="text-white"> No se encontraron resultados </td>
                </tr>
            @else
                @foreach($prendas as $prenda)
                <tr>
                    <th scope="row" class="text-white">{{$prenda->id}}</th>
                    <td class="text-white">{{$prenda->nombre}}</td>
                    <td class="text-white">{{$prenda->talle}}</td>
                    <td><span class="color-box" style="background-color: {{$prenda->color}}"></span></td>
                    <td class="text-white">${{$prenda->precio}}</td>
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