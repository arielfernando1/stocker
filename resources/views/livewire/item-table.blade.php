<div class="overflow-x-auto">
    <input wire:model.live="search" type="text" placeholder="Buscar items ..."
        class="mb-4 px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-600">

    <table class="min-w-full divide-y my-7 divide-gray-200">
        <thead class="bg-gray-50 dark:bg-gray-800">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoria</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Marca</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Costo</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Editar</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 text-gray-600 dark:bg-gray-800">
            @foreach ($items as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->id }}</td>
                    <td>
                        @if ($item->is_service)
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Servicio
                            </span>
                        @else
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                Producto
                            </span>
                        @endif
                    </td>
                    <td>
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                            {{ $item->category->name }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->brand }}</td>
                    @switch(true)
                        @case($item->stock === null)
                            <td class="px-6 py-4 whitespace-nowrap text-warning"></td>
                        @break

                        @case($item->stock === 0)
                            <td class="px-6 py-4 whitespace-nowrap text-danger"><strong>{{ $item->stock }}</strong></td>
                        @break

                        @case($item->stock < 0)
                            <td class="px-6 py-4 whitespace-nowrap bg-yellow-200 dark:bg-yellow-950">
                                <strong>{{ $item->stock }}</strong>
                            </td>
                        @break

                        @case($item->stock < 10)
                            <td class="px-6 py-4 whitespace-nowrap bg-red-200 dark:bg-red-950">
                                <strong>{{ $item->stock }}</strong>
                            </td>
                        @break

                        @default
                            <td class="px-6 py-4 whitespace-nowrap bg-green-200 dark:bg-green-950">
                                <strong>{{ $item->stock }}</strong>
                            </td>
                    @endswitch

                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->cost }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->price }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->description }}</td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('items.show', $item->id) }}" class="btn btn-primary"><i
                                class="bi bi-eye"></i> Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $items->links() }}
</div>
