<div class="p-4">
    <h1>Confirmar Venta</h1>
    <hr class="my-4">
    <h1 class="text-5xl text-center m-6">{{ $total }} USD</h1>
    <div class="text-center">
        <div class="mb-4">
            <label for="payment" class="col-sm-2">Pagó con</label>
            <div class="col-sm-10">
                <input wire:model.live='payment' type="number" step="0.01" name="payment" id="payment"
                    class="form-control text-center dark:bg-gray-600">
            </div>
        </div>
        <div class="mb-4">
            <label for="change" class="col-sm-2">Cambio</label>
            <div class="col-sm-10">
                <input wire:model='amount' type="number" step="0.01" name="change" id="change"
                    class="form-control text-center dark:bg-gray-600" disabled>
            </div>
            <div class="mt-4">
                <x-button wire:click='confirmSale' class="bg-green-500 hover:bg-green-700">Cobrar</x-button>
                <x-button wire:click='printTicket'>Imprimir Ticket</x-button>
            </div>
        </div>
    </div>

</div>
