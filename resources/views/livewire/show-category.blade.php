<div class="bg-gray-200 shadow-xl rounded-xl p-4 md:p-8 dark:bg-gray-700 dark:text-gray-200">
    <p class="text-lg md:text-xl font-semibold">Nombre: <span>{{ $category->name }}</span>
    </p>
    <p class="mt-2 md:mt-4">Descripción: <span class="text-gray-700">{{ $category->description }}</span></p>
    <p class="mt-2 md:mt-4">Fecha de creación: <span class="text-gray-700">{{ $category->created_at }}</span></p>
    <p class="mt-2 md:mt-4">Fecha de actualización: <span class="text-gray-700">{{ $category->updated_at }}</span>
    </p>
    <button wire:click="$dispatch('openModal', { component: 'new-item', arguments: {category : {{ $category }}} })"
        class="bg-green-500 dark:bg-green-900 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4">Crear
        Item</button>
    <button class="bg-green-500 dark:bg-green-900 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4"
        onclick="Livewire.dispatch('openModal', { component: 'edit-category', arguments: {category_id : {{ $category->id }}} })">Editar
        Categoria</button>
</div>
