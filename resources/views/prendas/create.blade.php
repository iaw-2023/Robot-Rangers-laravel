@extends('layouts.app')

@section('content')
<div class="container" >
<div class="card col-6 offset-3 bg-gray-800 dark:bg-gray-900 shadow"style="border-color:black" >
  <h5 class="card-header bg-gray-800 dark:bg-gray-900" style="color:white">Crear prendas</h5>
  <div class="card-body">
  @include('messages')
     <form action="/prendas" method="POST">
        @csrf
        <div class="mb-3 bg-gray-800 dark:bg-gray-900" style="color:white">
            <label class="form-label bg-gray-800 dark:bg-gray-900" style="color:white">Nombre</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre')}}">
            @error('nombre')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 bg-gray-800 dark:bg-gray-900" style="color:white">
            <label class="form-label bg-gray-800 dark:bg-gray-900" style="color:white">ID Marca</label>
            <input type="text" name="marca_id" class="form-control @error('marca_id') is-invalid @enderror" value="{{old('marca_id')}}">
            @error('marca_id')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 bg-gray-800 dark:bg-gray-900" style="color:white">
            <label class="form-label bg-gray-800 dark:bg-gray-900" style="color:white">ID Categoria</label>
            <input type="text" name="categoria_id" class="form-control @error('categoria_id') is-invalid @enderror" value="{{old('categoria_id')}}">
            @error('categoria_id')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 bg-gray-800 dark:bg-gray-900" style="color:dark">
        <label for="talle" style="color:white">Seleccione un talle:</label>
        <select id="talle" name="talle">
            <option value="xs">xs</option>
            <option value="s">s</option>
            <option value="m">m</option>
            <option value="l">l</option>
            <option value="xl">xl</option>
        </select>
        </div>
        <div class="mb-3 bg-gray-800 dark:bg-gray-900" style="color:white">
            <label class="form-label bg-gray-800 dark:bg-gray-900" style="color:white">Color</label>
            <input type="text" name="color" class="form-control @error('color') is-invalid @enderror" value="{{old('color')}}">
            @error('color')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 bg-gray-800 dark:bg-gray-900" style="color:white">
            <label class="form-label bg-gray-800 dark:bg-gray-900" style="color:white">Imagen</label>
            <input type="text" name="imagen" class="form-control @error('imagen') is-invalid @enderror" value="{{old('imagen')}}">
            @error('imagen')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 bg-gray-800 dark:bg-gray-900" style="color:white">
            <label class="form-label bg-gray-800 dark:bg-gray-900" style="color:white">Precio</label>
            <input type="text" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{old('precio')}}">
            @error('precio')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 bg-gray-800 dark:bg-gray-900" style="color:white">
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