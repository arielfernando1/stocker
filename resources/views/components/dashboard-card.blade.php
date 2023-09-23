@props(['data' => '', 'label' => '', 'route' => null])

<div class="shadow-md rounded-lg p-7 text-gray-600 bg-gray-100 dark:bg-gray-700 dark:text-gray-500">
    <div class="text-5xl font-semibold">{{ $data }}</div>
    <label class="text-gray-500">{{ $label }}</label>
    @if ($route)
        <a href="{{ route($route) }}" class="text-blue-500 hover:text-blue-700 underline mt-2 block">Ver {{ $label }}</a>
    @endif
</div>
