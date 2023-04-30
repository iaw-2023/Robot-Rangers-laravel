@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card col-6 offset-3">
    <div class="card-header">
        Nombre = {{$prenda->nombre}}
    </div>
    <div class="card-header">
        ID Marca = {{$prenda->marca_id}}
    </div>
    <div class="card-header">
        ID Categoria = {{$prenda->categoria_id}}
    </div>
    <div class="card-header">
        Talle = {{$prenda->talle}}
    </div>
    <div class="card-header">
        Color = {{$prenda->color}}
    </div>
    <div class="card-header">
        Imagen = <a href="{{$prenda->imagen}}">Link</a>
    </div>
    <div class="card-header">
        Precio = {{$prenda->precio}}
    </div>
    <div class="card-header">
        Descripcion = {{$prenda->descripcion}}
    </div>
    </div>
</div>
@endsection