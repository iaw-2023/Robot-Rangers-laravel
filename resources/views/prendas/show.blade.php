@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card col-6 offset-3">
    <div class="card-header">
        Nombre = {{$prenda->nombre}}
    </div>
    <div class="card-header">
        Marca = {{$prenda->marca->nombre}}
    </div>
    <div class="card-header">
        Categoria = {{$prenda->categoria->nombre}}
    </div>
    <div class="card-header">
        Talle = {{$prenda->talle}}
    </div>
    <div class="card-header">
        Color = <span style="display: inline-block; width: 20px; height: 20px; background-color: {{$prenda->color}}; margin-right: 5px;"></span>
    </div>
    <div class="card-header">
        Imagen = <a href="{{$prenda->imagen}}">Link</a>
    </div>
    <div class="card-header">
        Precio = ${{$prenda->precio}}
    </div>
    <div class="card-header">
        Descripcion = {{$prenda->descripcion}}
    </div>
    </div>
</div>
@endsection