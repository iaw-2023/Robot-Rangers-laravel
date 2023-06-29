@extends('layouts.app')

@section('content')
<div class="container" >
<div class="card col-6 offset-3 bg-gray-800 dark:bg-gray-900 shadow">
  <h5 class="card-header bg-gray-800 dark:bg-gray-900">Crear marca</h5>
  <div class="card-body">
  @include('messages')
    <form action="/marcas" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 bg-gray-800 dark:bg-gray-900">
            
            <label class="form-label bg-gray-800 dark:bg-gray-900">Nombre</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre')}}">
            @error('nombre')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
            
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

            <label class="form-label bg-gray-800 dark:bg-gray-900">Descripcion</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{old('descripcion')}}">
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