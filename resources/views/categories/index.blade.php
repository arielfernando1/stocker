<x-app-layout>
    <x-messages />
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Categorias
        </h2>
    </x-slot>

    <div class="flex justify-center">
        <livewire:category-table />
    </div>
</x-app-layout>
