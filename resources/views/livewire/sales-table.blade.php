<div>
    <table class="min-w-full divide-y divide-gray-200 my-3 ">
        <thead>
            <tr>
                <th
                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider dark:bg-gray-700">
                    Cantidad
                </th>
                <th
                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider dark:bg-gray-700">
                    Item
                </th>
                <th
                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider dark:bg-gray-700">
                    V. Unit
                </th>
                <th
                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider dark:bg-gray-700">
                    Total
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-700 select-none">
            @foreach ($saleDetails as $sale)
                <tr>
                    {{-- <td class="px-6 py-1 whitespace-nowrap">
                        {{ $sale->created_at->format('H:i:s') }}
                    </td>
                    <td wire:click="$dispatch('openModal', { component: 'show-sale', arguments: {sale: {{ $sale }}} })"
                        class="px-6 hover:bg-gray-200 py-1 whitespace-nowrap dark:hover:bg-gray-600">
                        @if ($sale->quantity > 1)
                            {{ $sale->item->name }} x {{ $sale->quantity }}
                        @else
                            {{ $sale->item->name }}
                        @endif
                    </td>
                    <td class="px-6 py-1 whitespace-nowrap">
                        {{ $sale->total }}
                        {}
                    </td> --}}
                    <td>{{ $sale->quantity }}</td>
                    <td>{{ $sale->item->name }}</td>
                    <td>{{ $sale->item->price }}</td>
                    <td>{{ $sale->total }}</td>

                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <strong>Total</strong>
                </td>
                <td></td>
                <td></td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <strong id="totalDay">${{ $saleDetails->sum('total') }}</strong>
                </td>
            </tr>
        </tfoot>
    </table>


</div>
