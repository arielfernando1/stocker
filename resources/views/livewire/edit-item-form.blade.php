<div class="bg-gray-50 shadow-lg rounded-xl p-7 dark:bg-gray-800 text-gray-600">

    @if (session('success'))
        <div id="alert-success" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit="save">

        <div class="mb-4">
            <label for="category" class="block">Categoria</label>
            <select wire:model="form.category_id" class="form-select dark:bg-gray-800" name="category_id"
                id="category_id">
                <option value="{{ $item->category->id }}" selected>{{ $item->category->name }}</option>
                {{-- @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach --}}
            </select>

        </div>

        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nombre</label>
            <input wire:model.live="form.name" type="text" name="name" id="name"
                class="form-input dark:bg-gray-800">

        </div>
        @error('form.name')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <div class="mb-4">
            <label for="brand" class="block text-gray-700">Marca</label>
            <input wire:model="form.brand" type="text" name="brand" id="brand"
                class="form-input dark:bg-gray-800" placeholder="" aria-describedby="helpId">
        </div>
        @if (!$item->is_service)
            <div class="mb-4">
                <label for="stock" class="block text-gray-700">Stock</label>
                <input wire:model.defer="form.stock" type="number" min="0" name="stock" id="stock"
                    class="form-input dark:bg-gray-800" placeholder="Existencias" aria-describedby="helpId">
            </div>
        @endif
        <div class="mb-4">
            <label for="cost" class="block text-gray-700">Costo</label>
            <input wire:model="form.cost" type="number" step="0.01" min="0.01" name="cost" id="cost"
                class="form-input dark:bg-gray-800" placeholder="" aria-describedby="helpId">
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700">Precio</label>
            <input wire:model="form.price" type="number" step="0.01" min="0.01" name="price" id="price"
                class="form-input dark:bg-gray-800" placeholder="" aria-describedby="helpId">
            <p id="helpId" class="text-gray-600">Precio de venta al público</p>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Descripcion</label>
            <input wire:model.defer="form.description" type="text" name="description" id="description"
                class="form-input dark:bg-gray-800" placeholder="" aria-describedby="helpId">
        </div>

        <button type="submit"
            class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded m-3 dark:bg-yellow-800 dark:hover:bg-yellow-900">
            <i class="bi bi-save-fill"></i> Actualizar
        </button>
    </form>
    <button wire:click="delete"
        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded m-3 dark:bg-red-800 dark:hover:bg-red-900">
        <i class="bi bi-trash-fill"></i> Eliminar
    </button>


    <a href="{{ route('items.index') }}"
        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded m-3 dark:bg-blue-800 dark:hover:bg-blue-900"><i
            class="bi bi-arrow-left"></i> Regresar</a>
</div>
<script>
    setTimeout(function() {
        $('#alert-success').fadeOut('fast');
    }, 3000); // <-- time in milliseconds
</script>
