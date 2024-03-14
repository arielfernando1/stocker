<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  leading-tight">
            Items
        </h2>
    </x-slot>

    <div class="flex justify-center my-10">
        <x-button class="bg-blue-500 hover:bg-blue-700 m-5 text-white font-bold py-2 px-4 rounded"
            onclick="Livewire.dispatch('openModal', { component: 'new-item' })">Nuevo Item</x-button>
        {{-- <button class="bg-green-500 hover:bg-green-700 m-5 text-white font-bold py-2 px-4 rounded"
            onclick="Livewire.dispatch('openModal', { component: 'items-c-s-v' })">Importar desde CSV</button> --}}
        <x-button class="bg-green-500 hover:bg-green-700 m-5 text-white font-bold py-2 px-4 rounded">
            <a href="{{ route('items.export') }}">Exportar Inventario</a>
        </x-button>

    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <livewire:item-table />

    </div>
    <script>
        window.addEventListener('itemAdded', event => {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Item agregado exitosamente',
                showConfirmButton: false,
                timer: 1500

            })
        })
    </script>

</x-app-layout>
