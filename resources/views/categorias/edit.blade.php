@extends('layouts.app')

@section('content')
<div class="container">
<div class="card col-6 offset-3">
  <h5 class="card-header">Editar categoria</h5>
  <div class="card-body">
  @include('messages')
     <form action="/categorias/{{$categoria->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre"   class="form-control @error('nombre') is-invalid @enderror" value="{{$categoria->nombre}}">
            @error('nombre')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
     </form>
  </div>
</div>
</div>
@endsection