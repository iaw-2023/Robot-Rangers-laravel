@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card col-6 offset-3">
    <div class="card-header show">
        Nombre = {{$marca->nombre}}
    </div>
    <div class="card-header show">
        Imagen = <img class="card-img-top img-fluid imagen-td" src="{{$marca->imagen}}">
    </div>
    <div class="card-header show">
        Descripcion = {{$marca->descripcion}}
    </div>
    </div>
</div>
@endsection