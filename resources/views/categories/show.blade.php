<x-app-layout>
    <div class="md:flex md:m-14 my-3">
        <livewire:show-category :category="$category" />
        <div class="shadow-xl rounded-xl md:ml-8 mt-4 md:mt-0 text-center">
            {{-- <h3 class="text-xl text-gray-600 md:text-2xl font-semibold">Items</h3> --}}
            <table class="dark:bg-gray-900 dark:text-gray-600">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre
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
