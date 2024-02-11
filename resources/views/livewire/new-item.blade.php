<div class="flex p-14 dark:bg-gray-700 dark:text-gray-400">
    <form wire:submit="save" class="w-full max-w-md mx-auto">
        <div class="mb-4">
            <input wire:model.live="is_service" type="radio" name="item" value="0" checked> Producto
            <input wire:model.live="is_service" type="radio" name="item" value="1"> Servicio

        </div>
        <div class="mb-4">
            <label>Categoría</label>
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
            <label for="name" class="block font-medium ">Producto</label>
            <input wire:model="form.name" type="text" id="name"
                class="mt-1 p-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-300"
                placeholder="Nombre del producto">
            @error('form.name')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="brand" class="block font-medium">Marca</label>
            <input wire:model="form.brand" type="text" id="brand"
                class="mt-1 p-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-300"
                placeholder="Marca del producto">
            @error('form.brand')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="stock" class="block font-medium ">Stock</label>
            <input wire:model="form.stock" type="number" id="stock"
                class="mt-1 p-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-300 disabled:bg-red-600"
                placeholder="Stock del producto" @if ($is_service) disabled @endif>
            @error('form.stock')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="cost" class="block font-medium">Costo</label>
            <input wire:model.live="form.cost" type="number" step="0.01" id="cost"
                class="mt-1 p-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-300"
                placeholder="Costo del producto">
            @error('form.cost')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="price" class="block font-medium ">Precio</label>
            <input wire:model.live="form.price" type="number" step="0.01" id="price"
                class="mt-1 p-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-300"
                placeholder="Precio del producto">
            @error('form.price')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="profit" class="block font-medium">Porcentaje de ganancia</label>
            <input wire:model.live="form.profit" type="number" step="0.01" id="percent_profit"
                class="mt-1 p-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-300"
                placeholder="Porcentaje de ganancia">
            @error('form.profit')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block font-medium">Descripción</label>
            <input wire:model="form.description" type="text" id="description"
                class="mt-1 p-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-300"
                placeholder="Descripción del producto">
            @error('description')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <button id="register" type="submit"
            class="bg-indigo-500 text-white p-2 rounded-md hover:bg-indigo-600 transition duration-300 ease-in-out">Registrar</button>
    </form>
</div>
