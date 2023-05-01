@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 d-flex flex-wrap justify-content-center">
        <div class="card bg-success text-white m-3" style="width: 18rem;">
            <div class="card-header">Categorias</div>
                <div class="card-body py-5 d-grid">
                    <a class="btn btn-dark btn-block mb-3" href="/categorias/create" role="button">Crear categoria</a>
                    <a class="btn btn-dark btn-block" href="/categorias" role="button">Ver categorias</a>
                </div>
        </div>
        <div class="card bg-success text-white m-3" style="width: 18rem;">
        <div class="card-header">Marcas</div>
            <div class="card-body py-5 d-grid">
                <a class="btn btn-dark btn-block mb-3" href="/marcas/create" role="button">Crear marca</a>
                <a class="btn btn-dark btn-block" href="/marcas" role="button">Ver marcas</a>
            </div>
        </div>
        <div class="card bg-success text-white m-3" style="width: 18rem;">
        <div class="card-header">Prendas</div>
            <div class="card-body py-5 d-grid">
                <a class="btn btn-dark btn-block mb-3" href="/prendas/create" role="button">Crear prenda</a>
                <a class="btn btn-dark btn-block" href="/prendas" role="button">Ver prendas</a>
            </div>
        </div>
        <div class="card bg-success text-white m-3" style="width: 18rem;">
        <div class="card-header">Pedidos:</div>
            <div class="card-body py-5 d-grid">
                <a class="btn btn-dark btn-block" href="/pedidos" role="button">Ver pedidos</a>
            </div>
        </div>
        <div class="card bg-success text-white m-3" style="width: 18rem;">
        <div class="card-header">Detalle Pedidos:</div>
            <div class="card-body py-5 d-grid">
                <a class="btn btn-dark btn-block" href="/detallePedidos" role="button">Ver detalles de pedidos</a>
            </div>
        </div>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>
@endsection
@section('logo')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="d-flex justify-content-center">
            <img src="{{ asset('images/logo.png') }}" class="img-fluid w-30">
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection
