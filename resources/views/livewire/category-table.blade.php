<div>
    <div class="overflow-x-auto">
        <input wire:model.live="search" type="text" placeholder="Buscar categorias ..."
            class="mb-4 px-4 py-2 border border-gray-300 rounded-md">
        <button wire:click="$dispatch('openModal', { component: 'new-category' })"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Crear
            Categoria</button>

        <table class="min-w-full divide-y my-7 divide-gray-200">
            <thead class="bg-gray-50">
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
            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-700 dark:text-gray-200">
                @foreach ($categories as $category)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $category->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $category->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $category->description }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                href="{{ route('categories.show', $category) }}">Editar</a>
                            <button wire:click="delete({{ $category->id }})"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
</div>
