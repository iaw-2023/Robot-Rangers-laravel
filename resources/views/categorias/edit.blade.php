@extends('layouts.app')

@section('content')
<div class="container">
<div class="card col-6 offset-3 bg-gray-100 dark:bg-gray-900 shadow"style="border-color:black">
  <h5 class="card-header bg-gray-100 dark:bg-gray-900" style = "color:white">Editar categoria</h5>
  <div class="card-body">
  @include('messages')
     <form action="/categorias/{{$categoria->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3 bg-gray-100 dark:bg-gray-900 " style="color:white">
            <label class="form-label bg-gray-100 dark:bg-gray-900" style="color:white">Nombre</label>
            <input type="text" name="nombre"   class="form-control @error('nombre') is-invalid @enderror" value="{{$categoria->nombre}}">
            @error('nombre')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 bg-gray-100 dark:bg-gray-900">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
     </form>
  </div>
</div>
</div>
@endsection