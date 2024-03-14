<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF View</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #999;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-8">Reporte de Inventario</h1>
        <h2>Fecha: {{ date('Y-m-d') }}</h2>
        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Costo</th>
                        <th>Precio</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td class="border">{{ $item->id }}</td>
                            <td class="border">{{ $item->name }}</td>
                            <td class="border">{{ $item->brand }}</td>
                            <td class="border">{{ $item->cost }}</td>
                            <td class="border">{{ $item->price }}</td>
                            <td class="border">{{ $item->stock }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
