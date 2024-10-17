@extends('layouts.app')

@section('template_title')
Productos
@endsection

@section('content')
<div class="container-fluid">

    <div class="row mb-2">
        <div class="col d-flex justify-content-between align-items-center">

            <div class="col-auto d-flex align-items-center">
                <h5 class="mb-0 me-2">Buscar:</h5>
                <input class="form-control" type="search" id="search" oninput="buscarProducto()">
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Productos') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('productos.pdf') }}" class="btn btn-success btn-sm" data-placement="left">
                                {{ __('Descargar PDF') }}
                            </a>
&nbsp;
                            <a href="{{ route('productos.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Crear Nuevo') }}
                            </a>
                        </div>

                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success m-4">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body bg-white text-center">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Nombre</th>
                                    <th>Categoria</th>
                                    <th>Marca</th>
                                    <th>Unidad</th>
                                    <th>Precio Compra</th>
                                    <th>Precio Venta</th>
                                    <!-- <th >Estado</th> -->

                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->categoria->nombre }}</td>
                                    <td>{{ $producto->marca->nombre }}</td>
                                    <td>{{ $producto->unidade->nombre }}</td>
                                    <td> S/. {{ $producto->precioCompra }}</td>
                                    <td> S/. {{ $producto->precioVenta }}</td>
                                    <!-- <td >{{ $producto->estado }}</td> -->

                                    <td>
                                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('productos.show', $producto->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                            <a class="btn btn-sm btn-warning" href="{{ route('productos.edit', $producto->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $productos->withQueryString()->links() !!}
        </div>
    </div>

    <script>
        function buscarProducto() {
            let searchValue = document.getElementById('search').value.toLowerCase();
            let tableRows = document.querySelectorAll('tbody tr');

            tableRows.forEach(row => {
                // obtener los valores de las columnas que deseas buscar
                let nombreProducto = row.cells[1].textContent.toLowerCase();
                let categoria = row.cells[2].textContent.toLowerCase();
                let marca = row.cells[3].textContent.toLowerCase();
                let unidadmedida = row.cells[4].textContent.toLowerCase();

                // verificar si el valor de búsqueda se encuentra en alguna de las columnas
                if (nombreProducto.includes(searchValue) ||
                    categoria.includes(searchValue) ||
                    marca.includes(searchValue) ||
                    unidadmedida.includes(searchValue)) {
                    row.style.display = ''; // mostrar si la fila coincide
                } else {
                    row.style.display = 'none'; // ocultar si la fila no coincide
                }
            });
        }
    </script>

</div>
@endsection
