<div>
    <form wire:submit='save'>
        <div class="overflow-hidden">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">

                    <div class="col-span-6 sm:col-span-3">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" wire:model="name" id="name" name="name" autocomplete="name"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @error('name')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="description" class="block text-sm font-medium text-gray-700">Descripcion</label>
                        <input type="text" wire:model="description" id="description" name="description"
                            autocomplete="description"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                    </div>

                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">

                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-500 hover:bg-green-700 focus:outline-none">
                    Guardar
                </button>
            </div>
        </div>
</div>
