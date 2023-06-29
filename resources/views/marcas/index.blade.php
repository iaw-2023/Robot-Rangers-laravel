@extends('layouts.app')

@section('content')
<div class="container">
    @include('messages')
    <div class="col-xl-12">
         <form action = "{{route('marcas.index')}}" method = "GET">
         <div class="input-group align-items-center w-50">
            <input type="text" class="form-control h-100" name="filtro" value="{{$filtro}}">
            <div class="input-group-append">
                <input type="submit" class="btn btn-primary h-100 btn-block ml-3" value="Buscar">
            </div>
        </div>
         </form>
    </div>
    @can('marcas.create')
        <a href="/marcas/create" class="btn btn-success my-3">Crear marca</a>
    @endcan
    <table class="table border-b border-gray-100 dark:border-gray-700">
        <thead>
            <tr>
            <th scope="col" class="col">ID</th>
            <th scope="col" class="col">Nombre</th>
            </tr>
        </thead>
        <tbody>
            @if($marcas->count()==0)
                <tr>
                    <td colspan="2" class="text-white"> No se encontraron resultados </td>
                </tr>
            @else
                @foreach($marcas as $marca)
                <tr>
                    <th scope="row" class="text-white">{{$marca->id}}</th>
                    <td class="text-white">{{$marca->nombre}}</td>
                    <td>
                        <form action="/marcas/{{$marca->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                            @can('marcas.show') 
                                <a href="/marcas/{{$marca->id}}" class="btn btn-success">Ver</a>
                            @endcan
                            @can('marcas.edit')
                                <a href="/marcas/{{$marca->id}}/edit" class="btn btn-success">Editar</a>
                            @endcan
                            @can('marcas.destroy')
                                <button type="submit" class="btn btn-danger">Borrar</button>
                            @endcan
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