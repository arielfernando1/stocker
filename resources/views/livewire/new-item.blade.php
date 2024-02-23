<div class="flex p-14 dark:bg-gray-800">
    <form wire:submit="save" class="w-full max-w-md mx-auto">
        <div>
            @if ($item)
                <h1 class="text-2xl font-bold text-center mb-4">Editar {{ $item->name }}</h1>
            @else
                <h1 class="text-2xl font-bold text-center mb-4">Nuevo Item</h1>
            @endif
        </div>
        <div class="mb-4 flex items-center space-x-4">
            <x-input wire:model.live='is_service' type="radio" name="item" value="0" />
            <x-label for="is_service" :value="__('Producto')" />
            <x-input wire:model.live='is_service' type="radio" name="item" value="1" />
            <x-label for="is_service" :value="__('Servicio')" />

        </div>
        <div class="mb-4">
            <x-label for="category_id" :value="__('Categoría')" />
            <select wire:model="form.category_id"
                class="mt-1 p-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-300">
                @if ($category)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                    <option value="">Seleccione una categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                @endif
            </select>
            @error('form.category_id')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <x-label for="name" :value="__('Nombre')" />
            <x-input id="name" wire:model="form.name" class="block mt-1 w-full" type="text" name="name" />
            <x-input-error for="form.name" class="mt-2" />
        </div>
        <div class="mb-4">
            <x-label for="brand" :value="__('Marca')" />
            <x-input id="brand" wire:model="form.brand" class="block mt-1 w-full" type="text" name="brand" />
            <x-input-error for="form.brand" class="mt-2" />
        </div>
        <div class="mb-4">
            <x-label for="stock" :value="__('Stock')" />
            <x-input wire:model="form.stock" type="number" id="stock"
                class="mt-1 p-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-300 disabled:bg-red-100"
                placeholder="Stock del producto" :disabled="$is_service" />
        </div>
        <div class="mb-4">
            <x-label for="cost" :value="__('Costo')" />
            <x-input id="cost" wire:model="form.cost" class="block mt-1 w-full" type="number" step="0.01"
                name="cost" />
            <x-input-error for="form.cost" class="mt-2" />
        </div>
        <div class="mb-4">
            <x-label for="price" :value="__('Precio')" />
            <x-input id="price" wire:model="form.price" class="block mt-1 w-full" type="number" step="0.01"
                name="price" />
            <x-input-error for="form.price" class="mt-2" />
        </div>
        <div class="mb-4">
            <x-label for="profit" :value="__('Porcentaje de ganancia')" />
            <x-input wire:model.live='form.profit' type="number" step="0.01" id="percent_profit"
                class="mt-1 p-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-300"
                placeholder="Porcentaje de ganancia" />
            <x-input-error for="form.profit" class="mt-2" />
        </div>
        <div class="mb-4">
            <x-label for="description" :value="__('Descripción')" />
            <textarea wire:model="form.description" id="description"
                class="mt-1 p-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-300"
                placeholder="Descripción del producto"></textarea>
            <x-input-error for="form.description" class="mt-2" />
        </div>
        <x-button>
            {{ __('Guardar') }}
        </x-button>
    </form>
</div>
