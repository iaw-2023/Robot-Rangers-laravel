@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 d-flex flex-wrap justify-content-center">

        @can('categorias.index')
            <div class="card m-3 cardDashboard shadow">
                <div class="card-header cardHeaderDashboard bg-gray-800 text-white">Categorías</div>
                <div class="card-body py-4 d-flex flex-column justify-content-center">
                    @can('categorias.create')
                        <a class="btn btn-secondary btn-block mb-3" href="/categorias/create" role="button">Crear categoría</a>
                    @endcan
                    @can('categorias.index')
                        <a class="btn btn-light btn-block" href="/categorias" role="button">Ver categorías</a>
                    @endcan
                </div>
            </div>
        @endcan

        @can('marcas.index')
            <div class="card m-3 cardDashboard shadow">
                <div class="card-header cardHeaderDashboard bg-gray-800 text-white">Marcas</div>
                <div class="card-body py-4 d-flex flex-column justify-content-center">
                    @can('marcas.create')
                        <a class="btn btn-secondary btn-block mb-3" href="/marcas/create" role="button">Crear marca</a>
                    @endcan
                    @can('marcas.show')
                        <a class="btn btn-light btn-block" href="/marcas" role="button">Ver marcas</a>
                    @endcan
                </div>
            </div>
        @endcan
        
        @can('prendas.index')
            <div class="card m-3 cardDashboard shadow">
            <div class="card-header cardHeaderDashboard bg-gray-800 text-white">Prendas</div>
                <div class="card-body py-4 d-flex flex-column justify-content-center">
                    @can('prendas.create')
                        <a class="btn btn-secondary btn-block mb-3" href="/prendas/create" role="button">Crear prenda</a>
                    @endcan
                    @can('prendas.index')
                    <a class="btn btn-light btn-block" href="/prendas" role="button">Ver prendas</a>
                    @endcan
                </div>
            </div>
        @endcan

        @can('pedidos.index')
            <div class="card m-3 cardDashboard shadow">
            <div class="card-header cardHeaderDashboard bg-gray-800 text-white">Pedidos</div>
                <div class="card-body py-4 d-flex flex-column justify-content-center">
                    @can('pedidos.index')
                    <a class="btn btn-light btn-block" href="/pedidos" role="button">Ver pedidos</a>
                    @endcan
                </div>
            </div>
        @endcan

    </div>
    <div class="col-md-2"></div>
  </div>
</div>
@endsection

@section('logo')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 d-flex justify-content-center">
            <img src="{{ asset('images/logo.png') }}" class="img-fluid w-50">
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection
