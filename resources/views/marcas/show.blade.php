@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card col-6 offset-3">
    <div class="card-header">
        Nombre = {{$marca->nombre}}
    </div>
    <div class="card-header">
        Imagen = <a href="{{$marca->imagen}}">Link</a>
    </div>
    <div class="card-header">
        Descripcion = {{$marca->descripcion}}
    </div>
    </div>
</div>
@endsection