<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <style>
        /* body {
            font-family: Arial, sans-serif;
        } */

        table {
            width: 100%;
            border-collapse: collapse;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
        footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 0.8em;
            margin-top: 20px;
            color: #777;
            background-color: #ffffff;
            padding: 10px 0;
        }
    </style>
</head>

<body>
    <h1>Lista de Productos</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Marca</th>
                <th>Unidad</th>
                <th>Precio Compra</th>
                <th>Precio Venta</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->categoria->nombre }}</td>
                <td>{{ $producto->marca->nombre }}</td>
                <td>{{ $producto->unidade->nombre }}</td>
                <td>S/. {{ $producto->precioCompra }}</td>
                <td>S/. {{ $producto->precioVenta }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <footer>
        &copy; {{ date('Y') }} Empresa que vende productos. Todos los derechos reservados.
    </footer>

</body>

</html>
