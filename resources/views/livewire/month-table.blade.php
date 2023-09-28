<div class="p-4 shadow-xl rounded-xl">
    <div class="flex justify-between items-center mb-4">
        <!-- Month Selector -->
        <label for="date" class="block mr-4 dark:text-gray-200">Seleccione un mes:</label>
        <input type="month" id="date" wire:model.live="date"
            class="p-2 bg-white rounded border border-gray-300 text-gray-700">


    </div>

    <!-- Sales Table -->
    <table class="table-auto w-full text-gray-600">
        <thead>
            <tr>
                <th class="px-4 py-2">Dia</th>
                <th class="px-4 py-2">Total</th>
                <th class="px-4 py-2">Detalle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td class="px-4 py-2">{{ $sale->date }}</td>
                    @switch(true)
                        @case($sale->total > 30)
                            <td class="px-4 py-2 bg-green-200 dark:bg-green-500">${{ $sale->total }}</td>
                        @break

                        @case ($sale->total > 20)
                            <td class="px-4 py-2 bg-yellow-200 dark:bg-yellow-500">${{ $sale->total }}</td>
                        @break

                        @case ($sale->total < 20)
                            <td class="px-4 py-2 bg-red-200 dark:bg-red-500">${{ $sale->total }}</td>
                        @break

                        @default
                            <td class="px-4 py-2">${{ $sale->total }}</td>
                    @endswitch
                    <td class="px-4 py-2">
                        <button
                            wire:click="$dispatch('openModal', { component: 'day-sales', arguments: {date: {{ $sale->date }}} })">
                            <i class="bi bi-eye"></i> Detalles</button>
                        {{-- <button
                            wire:click="$dispatch('openModal', { component: 'edit-user', arguments: { user: {{ $user->id }} }})">Edit
                            User</button> --}}


                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Total Sales for the Month -->
    <div class="text-lg font-semibold dark:text-gray-600 text-center m-8">
        Total: ${{ $sales->sum('total') }}
    </div>
</div>
