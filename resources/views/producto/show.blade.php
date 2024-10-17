@extends('layouts.app')

@section('template_title')
    {{ $producto->name ?? __('Show') . " " . __('Producto') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('productos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $producto->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Categoria:</strong>
                                    {{ $producto->categoria->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Marca:</strong>
                                    {{ $producto->marca->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Unidad:</strong>
                                    {{ $producto->unidade->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Precio Compra:</strong>
                                    {{ $producto->precioCompra }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Precio Venta:</strong>
                                    {{ $producto->precioVenta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $producto->estado }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
