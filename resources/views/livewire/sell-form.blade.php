<div class="flex text-center">
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="m-4 bg-white shadow-md rounded-lg p-4">
            <h1 class="text-center">Venta No. {{ $sale?->id }}</h1>
            <hr class="my-4">
            <form wire:submit='addToCart'>
                @csrf
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @error('qty')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('item')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('total')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-4">
                    <label for="quantity" class="col-sm-2">Cantidad</label>
                    <div class="col-sm-10">
                        <input id="qty" wire:model='quantity' wire:change='calculateTotal' min="1"
                            type="number" value="1" name="quantity" id="qty"
                            class="form-control text-center dark:bg-gray-600" onchange="calculateTotal()"
                            max="{{ $maxQuantity }}">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="items" class="col-sm-2">Item</label>
                    <div class="col-sm-10">
                        <div wire:ignore>
                            <select class="form-control" id="items">
                                <option value="">Seleccionar prod. o serv. [P]</option>
                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }} {{ $item->brand }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <label>Stock</label>
                    <div class="col-sm-10">
                        <input wire:model='stock' type="number" name="stock" id="stock"
                            class="form-control text-center dark:bg-gray-600 disabled:bg-yellow-400"
                            @if ($stock == 0) disabled @endif>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="price" class="col-sm-2">Precio Unitario</label>
                    <div class="col-sm-10">
                        <input wire:model='price' type="number" step="0.01" name="price" id="price"
                            class="form-control text-center dark:bg-gray-600" disabled>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="total" class="col-sm-2">Total</label>
                    <div class="col-sm-10">
                        <input wire:model='total' type="number" step="0.001" name="total" id="total"
                            class="form-control text-center dark:bg-gray-600" required>
                    </div>
                </div>

                <x-button id="register" type="submit"><i class="bi bi-plus"></i>
                    Agregar [A]</x-button>
            </form>
        </div>
        <div class="mx-4 bg-white shadow-md rounded-lg p-4">
            <livewire:sales-table :sale="$sale" />
            <div class="flex justify-end my-4">
                <x-button id='charge' class="bg-green-500 hover:bg-green-700"
                    wire:click="$dispatch('openModal', { component: 'confirm-sale-modal', arguments: { sale: {{ $sale }} }})">
                    <i class="bi bi-cash mx-1"></i> Cobrar [Enter] </x-button>

            </div>
        </div>
    </div>


</div>
<script>
    $(document).ready(function() {
        $('#items').select2();
        $('#items').on('change', function(e) {
            var data = $('#items').select2("val");
            @this.set('selectedItem', data);
            @this.call('getInfo');
        });
        document.addEventListener('saleAdded', function() {
            $('#items').val(null).trigger('change');
        });
    });

    $(document).keypress(function(e) {
        // A key
        if (e.which == 97) {
            $('#register').click();
        }
        if (e.which == 112) {
            $('#items').select2('open');
        }
        //enter key
        if (e.which == 13) {
            $('#charge').click();
        }
    });

    document.addEventListener('livewire:init', () => {
        Livewire.on('emailError', () => {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ha ocurrido un error al enviar el correo, por favor configuralo en Ajustes',
            })
        })

    })
</script>
