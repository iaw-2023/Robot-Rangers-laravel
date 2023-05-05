@extends('layouts.app')

@section('content')
<div class="container" >
<div class="card col-6 offset-3 bg-gray-800 dark:bg-gray-900 shadow"style="border-color:black" >
  <h5 class="card-header bg-gray-800 dark:bg-gray-900" style="color:white">Editar prendas</h5>
  <div class="card-body">
  @include('messages')
     <form action="/prendas/{{$prenda->id}}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3 bg-gray-800 dark:bg-gray-900" style="color:white">
            <label class="form-label bg-gray-800 dark:bg-gray-900" style="color:white">Nombre</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{$prenda->nombre}}">
            @error('nombre')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 bg-gray-800 dark:bg-gray-900" style="color:white">
            <label class="form-label bg-gray-800 dark:bg-gray-900" style="color:white">ID Marca</label>
            <input type="text" name="marca_id" class="form-control @error('marca_id') is-invalid @enderror" value="{{$prenda->marca_id}}">
            @error('marca_id')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 bg-gray-800 dark:bg-gray-900" style="color:white">
            <label class="form-label bg-gray-800 dark:bg-gray-900" style="color:white">ID Categoria</label>
            <input type="text" name="categoria_id" class="form-control @error('categoria_id') is-invalid @enderror" value="{{$prenda->categoria_id}}">
            @error('categoria_id')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 bg-gray-800 dark:bg-gray-900" style="color:dark">
        <label for="talle" style="color:white">Seleccione un talle:</label>
            <select id="talle" name="talle">
                <option value="xs" {{ $prenda->talle == 'xs' ? 'selected' : '' }}>xs</option>
                <option value="s" {{ $prenda->talle == 's' ? 'selected' : '' }}>s</option>
                <option value="m" {{ $prenda->talle == 'm' ? 'selected' : '' }}>m</option>
                <option value="l" {{ $prenda->talle == 'l' ? 'selected' : '' }}>l</option>
                <option value="xl" {{ $prenda->talle == 'xl' ? 'selected' : '' }}>xl</option>
            </select>
        </div>
        <div class="mb-3 bg-gray-800 dark:bg-gray-900" style="color:white">
            <label class="form-label bg-gray-800 dark:bg-gray-900" style="color:white">Color</label>
            <input type="color" name="color" class="bg-transparent" value="{{$prenda->color}}" style="width: 100%;">
        </div>
        <div class="mb-3 bg-gray-800 dark:bg-gray-900" style="color:white">
            <label class="form-label bg-gray-800 dark:bg-gray-900" style="color:white">Imagen</label>
            <input type="text" name="imagen" class="form-control @error('imagen') is-invalid @enderror" value="{{$prenda->imagen}}">
            @error('imagen')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 bg-gray-800 dark:bg-gray-900" style="color:white">
            <label class="form-label bg-gray-800 dark:bg-gray-900" style="color:white">Precio</label>
            <input type="text" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{$prenda->precio}}">
            @error('precio')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 bg-gray-800 dark:bg-gray-900" style="color:white">
            <label class="form-label bg-gray-800 dark:bg-gray-900" style="color:white">Descripcion</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{$prenda->descripcion}}">
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