@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card col-6 offset-3">
    <div class="card-header show">
        Nombre = {{$prenda->nombre}}
    </div>
    <div class="card-header show">
        Marca = {{$prenda->marca->nombre}}
    </div>
    <div class="card-header show">
        Categoria = {{$prenda->categoria->nombre}}
    </div>
    <div class="card-header show">
        Talle = {{$prenda->talle}}
    </div>
    <div class="card-header show">
        Color = <span class="color-box" style="background-color: {{$prenda->color}}"></span>
    </div>
    <div class="card-header show">
        Imagen = <img class="card-img-top img-fluid imagen-td" src="{{asset($prenda->imagen)}}">
    </div>
    <div class="card-header show">
        Precio = ${{$prenda->precio}}
    </div>
    <div class="card-header show">
        Descripcion = {{$prenda->descripcion}}
    </div>
    </div>
</div>
@endsection