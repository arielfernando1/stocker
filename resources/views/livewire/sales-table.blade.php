<div>
    <table class="min-w-full divide-y divide-gray-200 my-3 ">
        <thead>
            <tr>
                <th>
                    Cantidad
                </th>
                <th>
                    Item
                </th>
                <th>
                    V. Unit
                </th>
                <th>
                    Total
                </th>
                <th>
                    Borrar
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-700 select-none">
            @foreach ($saleDetails as $detail)
                <tr>
                    <td>
                        {{ $detail->quantity }}
                    </td>
                    <td>{{ $detail->item->name }}</td>
                    <td>{{ $detail->item->price }}</td>
                    <td>{{ $detail->total }}</td>
                    <td>
                        <x-button wire:click="deleteSaleDetail({{ $detail->id }})"
                            class="bg-red-500 hover:bg-red-700"><i class="bi bi-trash"></i></x-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <strong id="totalItems">{{ $saleDetails->sum('quantity') }}</strong>
                </td>
                <td></td>
                <td></td>

                <td class="px-6 py-4 whitespace-nowrap">
                    <strong id="totalDay">${{ $saleDetails->sum('total') }}</strong>
                </td>
            </tr>
        </tfoot>
    </table>
    <script>

    </script>


</div>
