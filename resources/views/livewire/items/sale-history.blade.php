<x-card-container>
    <table class="w-full text-gray-600">
        <thead>
            <tr>
                <th class="px-4 py-2 border-b-2">Fecha</th>
                <th class="px-4 py-2 border-b-2">Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td class="px-4 py-2 border-b">{{ $sale->created_at }}</td>
                    <td class="px-4 py-2 border-b">{{ $sale->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $sales->links() }}
</x-card-container>
