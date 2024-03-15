<div class="flex text-center">
    <div class="w-1/2 mx-4 bg-white shadow-md rounded-lg p-4">
        <form wire:submit='save'>
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
                            <option value="">Seleccionar prod. o serv.</option>
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

            <button id="register" type="submit"
                class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-xl"
                onclick="saveSale()"><i class="bi bi-cash"></i>
                Agregar [Enter]</button>
            <button type="button" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-xl"
                onclick="clearCart()"><i class="bi bi-trash"></i>
                Limpiar</button>
        </form>
    </div>
    <div class="w-1/2 mx-4 bg-white shadow-md rounded-lg p-4">
        <h3 class="text-center">Carrito</h3>
        <livewire:sales-table />
        <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-xl"
            onclick="getData()">Registrar</button>
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
        if (e.which == 13) {
            $('#register').click();
        }
        if (e.which == 112) {
            $('#items').select2('open');
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

    // function play() {
    //     var audio = new Audio('https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.mp3');
    //     audio.play();
    // }

    // function saveSale() {
    //     var sale = {
    //         quantity: document.getElementById('qty').value,
    //         item_id: document.getElementById('items').value,
    //         total: document.getElementById('total').value
    //     }
    //     var sales = JSON.parse(localStorage.getItem('sales')) || [];
    //     sales.push(sale);
    //     localStorage.setItem('sales', JSON.stringify(sales));
    //     getData();
    //     @this.call('toObject');


    // }

    // function clearCart() {
    //     localStorage.removeItem('sales');
    //     location.reload();
    // }

    // function getData() {
    //     var retrievedData = JSON.parse(localStorage.getItem("sales"));
    //     @this.set('localStorageCart', retrievedData);
    // }
</script>
