<x-app-layout>
    <div class="md:flex md:m-14 my-3">
        <div class="bg-gray-200 shadow-xl rounded-xl p-4 md:p-8 dark:bg-gray-700 dark:text-gray-200">
            <p class="text-lg md:text-xl font-semibold">Nombre: <span>{{ $category->name }}</span>
            </p>
            <p class="mt-2 md:mt-4">Descripción: <span class="text-gray-700">{{ $category->description }}</span></p>
            <p class="mt-2 md:mt-4">Fecha de creación: <span class="text-gray-700">{{ $category->created_at }}</span></p>
            <p class="mt-2 md:mt-4">Fecha de actualización: <span class="text-gray-700">{{ $category->updated_at }}</span>
            </p>
            <button wire:click="$dispatch('openModal', { component: 'new-item' })"
                class="bg-green-500 dark:bg-green-900 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4">Crear
                Item</button>
            <button wire:click="$dispatch('openModal', { component: 'edit-category' })"
                class="bg-blue-500 dark:bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Editar
                Categoria</button>


        </div>
        <div class="bg-gray-100 shadow-xl rounded-xl md:ml-8 mt-4 md:mt-0 text-center">
            <h3 class="text-xl md:text-2xl font-semibold">Items</h3>
            <table>
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Descripcion</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($category->items as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->description }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                    href="{{ route('items.show', $item) }}">Editar</a>
                                <button wire:click="delete({{ $item->id }})"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
        </div>
    </div>
</x-app-layout>
