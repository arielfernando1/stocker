<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Configuración
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <livewire:update-business-information />
        <x-section-border />
        <livewire:update-mail-receivers />
    </div>
    {{--
    <div class="flex space-x-4 p-4 justify-center">
        <div class="flex-1 mb-4 shadow-lg p-6 rounded-xl">
            <div class="flex items-center space-x-4">
                <input type="text" name="sale_notification_email" id="sale_notification_email" class="form-control flex-1" placeholder="Correo electrónico">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    onclick="Livewire.dispatch('openModal', { component: 'new-item' })">Agregar</button>
            </div>
            <small class="block mt-2">Este correo recibirá el reporte de ventas diario</small>
        </div>

        <div class="flex-1 mb-4 shadow-lg p-6 rounded-xl">
            <div class="flex items-center justify-between">
                <span class="text-gray-700">example@stocker.com</span>
                <button class="text-red-500 hover:text-red-700">Eliminar</button>
            </div>
        </div>

        <div class="flex-1 mb-4 shadow-lg p-6 rounded-xl">
            <div class="flex items-center justify-between">
                <span class="text-gray-700">example@stocker.com</span>
                <button class="text-red-500 hover:text-red-700">Eliminar</button>
            </div>
        </div>

        <div class="flex-1 mb-4 shadow-lg p-6 rounded-xl">
            <div class="flex items-center justify-between">
                <span class="text-gray-700">example@stocker.com</span>
                <button class="text-red-500 hover:text-red-700">Eliminar</button>
            </div>
        </div>
        <div class="flex-1 mb-4 shadow-lg p-6 rounded-xl">
            <div class="flex items-center justify-between">
                <span class="text-gray-700">example@stocker.com</span>
                <button class="text-red-500 hover:text-red-700">Eliminar</button>
            </div>
        </div>

    </div> --}}
</x-app-layout>
