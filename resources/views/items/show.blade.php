<x-app-layout>
    <div class="flex justify-center">
        <div class="mb-4 text-center">
            <x-card-container>
                <h2 class="text-2xl font-semibold">Detalles del {{ $item->is_service ? 'Servicio' : 'Producto' }}</h2>
                <ul class="mt-4">
                    <li>ID: {{ $item->id }}</li>
                    <li> Creado el: {{ $item->created_at }}</li>
                    @if ($item->created_at != $item->updated_at)
                        <li> Modificado el: {{ $item->updated_at }}</li>
                    @endif
                    <li>
                        <label class="{{ ($sales && $sales->count() > 0) ? 'text-green-500' : 'text-red-500' }}">
                            {{ ($sales && $sales->count() > 0) ? $sales->count() . ' ventas' : 'Sin ventas' }}
                        </label>
                    </li>
                </ul>
                <x-button
                    onclick="Livewire.dispatch('openModal', { component: 'new-item', arguments: { item: {{ $item }} }})"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
                    Editar
                </x-button>
            </x-card-container>


            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            {{-- <livewire:edit-item-form :item="$item" /> --}}
            @if ($sales->count() > 0)
                <div class="shadow-xl rounded-xl">
                    <h4 class="text-2xl text-gray-600 font-semibold m-3">Historial de ventas</h4>
                    <livewire:items.sale-history :item_id="$item->id" />
                </div>
            @endif
        </div>
    </div>
    {{-- <script>
        $('#deleteForm').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas seguro?',
                icon: 'warning',
                text: "¡No podras revertir esto! Se eliminara el producto: {{ $item->name }} y todas sus ventas.",
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Si, eliminar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    // submit the form
                    $('#deleteForm').unbind('submit').submit();

                }
            });
        });
        $('#productForm').change(function() {
            $('#productForm').data('changed', true);
        });
        $('#productForm').change(function() {
            $('#updateProduct').prop('disabled', false);
        });
        var nameInput = document.getElementById('name');
        var brandInput = document.getElementById('brand');
        nameInput.addEventListener('keyup', function() {
            this.value = this.value.toUpperCase();
        });

        brandInput.addEventListener('keyup', function() {
            this.value = this.value.toUpperCase();
        });
    </script> --}}
</x-app-layout>
