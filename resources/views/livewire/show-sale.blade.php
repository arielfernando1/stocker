<div class="border rounded-lg p-4 bg-white shadow-md dark:bg-gray-700 dark:text-gray-300">
    <p class="text-xl font-semibold mb-2">Venta No. {{$sale->id}}</p>
    <p class="mb-1"><span class="font-semibold">Item:</span>
        <a href="{{route('items.show', $sale->item->id)}}">{{ $sale->item->name }}</a>
    </p>
    <p class="mb-1"><span class="font-semibold">Cantidad:</span> {{ $sale->quantity }}</p>
    <p class="mb-1"><span class="font-semibold">Total:</span> {{ $sale->total }}</p>
    <p class="mb-1"><span class="font-semibold">Fecha:</span> {{ $sale->created_at }}</p>
    <button wire:click="delete({{ $sale->id }})"
        class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded mt-2">
        Eliminar
    </button>
</div>
