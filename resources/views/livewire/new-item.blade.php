<div class="flex p-14 dark:bg-gray-700 dark:text-gray-400">
    <form wire:submit="save" class="w-full max-w-md mx-auto">
        <div class="mb-4">
            <label>Seleccione </label>
            <input wire:model="is_service" type="radio" name="item" value="0" checked> Producto
            <input wire:model="is_service" type="radio" name="item" value="1"> Servicio

        </div>
        <div class="mb-4">
            <label>Categoría</label>
            <select wire:model="category_id"
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
        </div>

        <div class="mb-4">
            <label for="name" class="block font-medium ">Producto</label>
            <input wire:model="name" type="text" id="name"
                class="mt-1 p-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-300"
                placeholder="Nombre del producto" required>
            @error('name')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="brand" class="block font-medium">Marca</label>
            <input wire:model="brand" type="text" id="brand"
                class="mt-1 p-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-300"
                placeholder="Marca del producto">
            @error('brand')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="stock" class="block font-medium ">Stock</label>
            <input wire:model="stock" type="number" id="stock"
                class="mt-1 p-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-300"
                placeholder="Stock del producto">
            @error('stock')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="cost" class="block font-medium">Costo</label>
            <input wire:model="cost" type="number" step="0.01" id="cost"
                class="mt-1 p-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-300"
                placeholder="Costo del producto">
            @error('cost')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="price" class="block font-medium ">Precio</label>
            <input wire:model="price" type="number" step="0.01" id="price"
                class="mt-1 p-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-300"
                placeholder="Precio del producto" required>
            @error('price')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block font-medium">Descripción</label>
            <input wire:model="description" type="text" id="description"
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
