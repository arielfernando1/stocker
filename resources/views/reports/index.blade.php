<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Reportes
        </h2>
    </x-slot>
    <div class="flex m-6 space-x-4">
        <livewire:salescount />
        <livewire:total-incomes />
    </div>
    <div class="flex">
        <livewire:month-table />
    </div>
</x-app-layout>
