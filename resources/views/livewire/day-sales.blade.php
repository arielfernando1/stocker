<div>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Item</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            {{$date}}
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->created_at }}</td>
                    <td>{{ $sale->item->name }}</td>
                    <td>{{ $sale->quantity }}</td>
                    <td>{{ $sale->total }}</td>
                    <td>
                        <button
                            wire:click="$dispatch('openModal', { component: 'day-sales', arguments: {date: {{ $sale}}} })">
                            <i class="bi bi-eye"></i> Detalles</button>
                    </td>
                </tr>

            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Total</td>
                <td>{{ $sales->sum('total') }}</td>
            </tr>
        </tfoot>
    </table>
</div>
