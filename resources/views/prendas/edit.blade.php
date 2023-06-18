@extends('layouts.app')

@section('content')
<div class="container" >
<div class="card col-6 offset-3 bg-gray-800 dark:bg-gray-900 shadow">
  <h5 class="card-header bg-gray-800 dark:bg-gray-900"">Editar prendas</h5>
  <div class="card-body">
  @include('messages')
     <form action="/prendas/{{$prenda->id}}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3 bg-gray-800 dark:bg-gray-900">
            <label class="form-label bg-gray-800 dark:bg-gray-900">Nombre</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{$prenda->nombre}}">
            @error('nombre')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 bg-gray-800 dark:bg-gray-900 seleccionable">
            <label class="form-label bg-gray-800 dark:bg-gray-900">Marca</label>
            <select name="marca_id" class="form-select select2">
                @foreach ($marcas as $marca)
                    <option value="{{$marca->id}}" @if($prenda->marca_id == $marca->id) selected @endif>{{$marca->nombre}}</option>
                @endforeach
        </select>
        </div>
        <div class="mb-3 bg-gray-800 dark:bg-gray-900 seleccionable">
            <label class="form-label bg-gray-800 dark:bg-gray-900">Categoria</label>
            <select name="categoria_id" class="form-select select2">
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}" @if($prenda->categoria_id == $categoria->id) selected @endif>{{$categoria->nombre}}</option>
                @endforeach
        </select>
        </div>
        <div class="mb-3 bg-gray-800 dark:bg-gray-900 seleccionable">
        <label for="talle" class="form-label">Seleccione un talle:</label>
            <select id="talle" name="talle">
                <option value="xs" {{ $prenda->talle == 'xs' ? 'selected' : '' }}>xs</option>
                <option value="s" {{ $prenda->talle == 's' ? 'selected' : '' }}>s</option>
                <option value="m" {{ $prenda->talle == 'm' ? 'selected' : '' }}>m</option>
                <option value="l" {{ $prenda->talle == 'l' ? 'selected' : '' }}>l</option>
                <option value="xl" {{ $prenda->talle == 'xl' ? 'selected' : '' }}>xl</option>
            </select>
        </div>
        <div class="mb-3 bg-gray-800 dark:bg-gray-900">
            <label class="form-label bg-gray-800 dark:bg-gray-900">Color</label>
            <input type="color" name="color" class="bg-transparent" value="{{$prenda->color}}" style="width: 100%;">
        </div>
        <div class="mb-3 bg-gray-800 dark:bg-gray-900">
            <label class="form-label bg-gray-800 dark:bg-gray-900">Imagen</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFileLang" lang="es" name="imagen">
            </div>
            @error('imagen')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 bg-gray-800 dark:bg-gray-900">
            <label class="form-label bg-gray-800 dark:bg-gray-900">Precio</label>
            <input type="text" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{$prenda->precio}}">
            @error('precio')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 bg-gray-800 dark:bg-gray-900">
            <label class="form-label bg-gray-800 dark:bg-gray-900">Descripcion</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{$prenda->descripcion}}">
            @error('descripcion')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 bg-gray-800 dark:bg-gray-900">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
     </form>
  </div>
</div>
</div>
@endsection