<div class="p-2">
    <!-- Select export format -->
    {{-- <label for="exportFormat" class="mr-2">Formato a exportar:</label>
    <select wire:model="selectedFormat" id="exportFormat" class="mr-4">
        <option value="pdf">PDF</option>
        <option value="csv">CSV</option>
    </select> --}}
    <h1 class="text-2xl font-bold text-center">Ventas del {{ $date }}</h1>
    <table class="min-w-full border-collapse border border-gray-300 my-2 text-center">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Hora</th>
                <th class="px-4 py-2">Items</th>
                <th class="px-4 py-2">Total</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr class="border-b border-gray-300">
                    <td>{{ $sale->created_at->format('H:i:s') }}</td>
                    <td>{{ $sale->saleDetails->count() }}</td>
                    <td>{{ $sale->total }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="bg-gray-200">
                <td class="px-4 py-2" colspan="2">Total</td>
                <td class="px-4 py-2">{{ '$' . $sales->sum('total') }}</td>
            </tr>
        </tfoot>
    </table>
    <div class="flex justify-center space-x-4">
        <button wire:click="export" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4"><i
                class="bi bi-download"></i> Exportar</button>
        <button wire:click="sendByEmail"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4"><i
                class="bi bi-envelope"></i> Enviar por email</button>
        <button wire:click="$dispatch('closeModal')"
            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-4"><i
                class="bi bi-x-circle"></i> Cerrar</button>
    </div>



</div>
