<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  leading-tight">
            Items
        </h2>
    </x-slot>

    <div class="flex justify-center my-10">
        <button class="bg-blue-500 hover:bg-blue-700 m-5 text-white font-bold py-2 px-4 rounded"
            onclick="Livewire.dispatch('openModal', { component: 'new-item' })">Agregar</button>
        <button class="bg-green-500 hover:bg-green-700 m-5 text-white font-bold py-2 px-4 rounded"
            onclick="Livewire.dispatch('openModal', { component: 'sell-form' })">Importar desde CSV</button>

    </div>

    <div class="flex justify-center">

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
