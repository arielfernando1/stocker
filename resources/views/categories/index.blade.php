<x-app-layout>
    <x-messages />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Categorias
        </h2>
    </x-slot>

    <div class="flex justify-center m-10">
        <livewire:category-table />
    </div>
</x-app-layout>
