@props(['value' => '', 'center' => false, 'class' => ''])
<td class="px-6 py-4 whitespace-nowrap dark:text-gray-400 {{ $class }} @if ($center) text-center @endif">
    {{ $value }}
    {{ $slot }}
</td>
