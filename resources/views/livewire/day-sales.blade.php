<div class="p-4">
    <!-- Select export format -->
    <label for="exportFormat" class="mr-2">Formato a exportar:</label>
    <select wire:model="selectedFormat" id="exportFormat" class="mr-4">
        <option value="pdf">PDF</option>
        <option value="csv">CSV</option>
    </select>
    <table class="w-full border-collapse border border-gray-300 my-2">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Fecha</th>
                <th class="px-4 py-2">Item</th>
                <th class="px-4 py-2">Cantidad</th>
                <th class="px-4 py-2">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr class="border-b border-gray-300">
                    <td class="px-4 py-2">{{ $sale->created_at }}</td>
                    <td class="px-4 py-2">{{ $sale->item->name }}</td>
                    <td class="px-4 py-2">{{ $sale->quantity }}</td>
                    <td class="px-4 py-2">{{ $sale->total }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="bg-gray-200">
                <td class="px-4 py-2" colspan="3">Total</td>
                <td class="px-4 py-2">{{ '$' . $sales->sum('total') }}</td>
            </tr>
        </tfoot>
    </table>
    <button wire:click="export" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4"><i
            class="bi bi-download"></i> Exportar</button>

</div>
