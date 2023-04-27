@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
                <tr>
                <th scope="row">{{$categoria->id}}</th>
                <td>{{$categoria->nombre}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
