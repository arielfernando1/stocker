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
        <div class="mb-4">
            <label for="quantity" class="col-sm-2">Cantidad</label>
            <div class="col-sm-10">
                <input wire:model='quantity' wire:click='calculateTotal' min="1" type="number" value="1"
                    name="quantity" id="qty" class="form-control text-center dark:bg-gray-600"
                    onchange="calculateTotal()">
            </div>
        </div>
        <div class="mb-4">
            <label for="products" class="col-sm-2">Producto</label>
            <div class="col-sm-10">
                <select wire:model='selectedItem' wire:click='getInfo' name="item_id" id="products"
                    class="form-control dark:bg-gray-600" autofocus required>
                    <option value="">Seleccionar prod. o serv.</option>
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}">{{ $item->name }} {{ $item->brand }}</option>
                    @endforeach
                </select>
            </div>

        </div>
        @if ($is_service)
            <div class="mb-4">
                <label for="description" class="col-sm-2">Stock</label>
                <div class="col-sm-10">
                    <input wire:model='stock' type="number" name="stock" id="stock"
                        class="form-control text-center dark:bg-gray-600" readonly>
                </div>

            </div>
        @elseif ($is_service == false)
            <div class="mb-4">
                <label>Stock</label>
                <div class="col-sm-10">
                    <input wire:model='stock' type="number" name="stock" id="stock"
                        class="form-control text-center dark:bg-gray-600" readonly>
                </div>
            </div>
        @endif
        <div class="mb-4">

            <label for="price" class="col-sm-2">Precio Unitario</label>
            <div class="col-sm-10">
                <input wire:model='price' type="number" step="0.01" name="price" id="price"
                    class="form-control text-center dark:bg-gray-600">
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
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded dark:bg-blue-950"><i
                class="bi bi-cash"></i>
            Registrar</button>
    </form>
</div>
