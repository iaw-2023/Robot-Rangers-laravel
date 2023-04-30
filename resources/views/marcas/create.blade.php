@extends('layouts.app')

@section('content')
<div class="container" >
<div class="card col-6 offset-3 bg-gray-800 dark:bg-gray-900 shadow"style="border-color:black" >
  <h5 class="card-header bg-gray-800 dark:bg-gray-900" style="color:white">Crear marca</h5>
  <div class="card-body">
  @include('messages')
     <form action="/marcas" method="POST">
        @csrf
        <div class="mb-3 bg-gray-800 dark:bg-gray-900" style="color:white">
            
            <label class="form-label bg-gray-800 dark:bg-gray-900" style="color:white">Nombre</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre')}}">
            @error('nombre')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
            
            <label class="form-label bg-gray-800 dark:bg-gray-900" style="color:white">Imagen</label>
            <input type="text" name="imagen" class="form-control @error('imagen') is-invalid @enderror" value="{{old('imagen')}}">
            @error('imagen')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror

            <label class="form-label bg-gray-800 dark:bg-gray-900" style="color:white">Descripcion</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{old('descripcion')}}">
            @error('descripcion')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror

        </div>
        <div class="mb-3 bg-gray-800 dark:bg-gray-900" style="color:white">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
     </form>
  </div>
</div>
</div>
@endsection