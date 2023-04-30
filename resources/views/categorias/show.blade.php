@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card col-6 offset-3">
    <div class="card-header">
        Nombre = {{$categoria->nombre}}
    </div>
    </div>
</div>
@endsection