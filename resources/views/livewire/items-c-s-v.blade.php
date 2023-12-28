<div class="p-6">
    <form wire:submit="save" class="space-y-4">
        <p class="text-lg">El archivo debe tener el siguiente formato:</p>
        <p class="text-sm">Nombre, Marca, Stock, Costo, Precio</p>
        <p class="text-sm">Separado por comas</p>
        <p class="text-sm">Por ejemplo:</p>
        <div class="flex flex-col space-y-1">
            <p class="text-sm">Producto 1, Marca 1, 10, 100, 150</p>
            <p class="text-sm">Producto 2, Marca 2, 20, 200, 250</p>
        </div>

        @if ($header)
            <div class="bg-blue-100 text-blue-800 px-4 py-2 rounded-md">
                <p>{{ implode(', ', $header) }}</p>
            </div>
        @endif

        <div class="flex flex-col">
            <label for="items" class="text-sm">Seleccionar Archivo CSV</label>
            <div class="mt-1">
                <div wire:ignore>
                    <input type="file" wire:model="file" class="w-full py-2 px-3 border rounded-md">
                </div>
                @error('file')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mt-4">
            <button type="button"
                class="w-full py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600"
                wire:click="save" wire:confirm="¿Estás seguro de que quieres guardar los datos del archivo CSV?">
                Guardar
            </button>
        </div>
    </form>
</div>
