<div class="overflow-x-auto">
    <input wire:model.live="search" type="text" placeholder="Buscar items ..."
        class="mb-4 px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-600">

    <table class="min-w-full divide-y my-7 divide-gray-200">
        <thead class="bg-gray-50 dark:bg-gray-800">
            <tr>
                <x-table-header :value="__('ID')" />
                <x-table-header :value="__('Tipo')" />
                <x-table-header :value="__('Categoria')" />
                <x-table-header :value="__('Nombre')" />
                <x-table-header :value="__('Marca')" />
                <x-table-header :value="__('Stock')" />
                <x-table-header :value="__('Costo')" />
                <x-table-header :value="__('Precio')" />
                <x-table-header :value="__('Descripción')" />
                <x-table-header :value="__('Acciones')" />
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <x-table-cell :value="$item->id" />
                    <x-table-cell>
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
                    </x-table-cell>
                    <x-table-cell>
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                            {{ $item->category->name }}
                        </span>
                    </x-table-cell>
                    <x-table-cell :value="$item->name" />
                    <x-table-cell :value="$item->brand" />
                    @switch(true)
                        @case($item->stock === null)
                            <x-table-cell :class="'bg-gray-200 dark:bg-gray-950'" :value="'NO APLICA'" :center="true" />
                        @break

                        @case($item->stock == 0)
                            <x-table-cell :class="'bg-red-200 dark:bg-red-950'" :value="$item->stock" :center="true" />
                        @break

                        @case($item->stock < 10)
                            <x-table-cell :class="'bg-yellow-200 dark:bg-yellow-950'" :value="$item->stock" :center="true" />
                        @break

                        @default
                            <x-table-cell :class="'bg-green-200 dark:bg-green-950'" :value="$item->stock" :center="true" />
                    @endswitch

                    <x-table-cell :value="$item->cost" />
                    <x-table-cell :value="$item->price" />
                    <x-table-cell :value="$item->description" />

                    <x-table-cell>
                        <a href="{{ route('items.show', $item->id) }}" class="text-green-500 font-bold">Ver</a>
                        <button class="text-blue-500 font-bold rounded"
                            wire:click="$dispatch('openModal', { component: 'new-item', arguments: { item: {{ $item }} }})">Editar</button>
                    </x-table-cell>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $items->links() }}
</div>
