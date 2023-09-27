<div class="flex text-center">
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
        @if ($stock == 0)
            <span
                class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">No
                hay stock</span>
        @endif
        @if ($is_service)
            <span
                class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Es
                un servicio</span>
        @endif
        <div class="mb-4">
            <label for="quantity" class="col-sm-2">Cantidad</label>
            <div class="col-sm-10">
                <input wire:model='quantity' wire:click='calculateTotal' min="1" type="number" value="1"
                    name="quantity" id="qty" class="form-control text-center dark:bg-gray-600"
                    onchange="calculateTotal()" max="{{ $maxQuantity }}">
            </div>
        </div>
        <!--Select2 items-->
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
                    class="form-control text-center dark:bg-gray-600" max="{{ $stock }}" disabled>
            </div>
        </div>
        <!-- Price -->
        <div class="mb-4">
            <label for="price" class="col-sm-2">Precio Unitario</label>
            <div class="col-sm-10">
                <input wire:model='price' type="number" step="0.01" name="price" id="price"
                    class="form-control text-center dark:bg-gray-600" disabled>
            </div>
        </div>
        <!-- Total -->
        <div class="mb-4">
            <label for="total" class="col-sm-2">Total</label>
            <div class="col-sm-10">
                <input wire:model='total' type="number" step="0.001" name="total" id="total"
                    class="form-control text-center dark:bg-gray-600" required>
            </div>
        </div>

        <button id="register" type="submit"
            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded dark:bg-blue-950"><i
                class="bi bi-cash"></i>
            Registrar</button>
    </form>
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
</script>
