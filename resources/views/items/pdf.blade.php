<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF View</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> --}}
</head>

<body class="bg-gray-100 font-sans">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-8">Reporte de Inventario</h1>
        <h2>Fecha: {{ date('Y-m-d') }}</h2>
        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="bg-gray-200 text-gray-700">ID</th>
                        <th class="bg-gray-200 text-gray-700">Nombre</th>
                        <th class="bg-gray-200 text-gray-700">Marca</th>
                        <th class="bg-gray-200 text-gray-700">Costo</th>
                        <th class="bg-gray-200 text-gray-700">Precio</th>
                        <th class="bg-gray-200 text-gray-700">Stock</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600">
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
