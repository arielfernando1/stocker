<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Reportes
        </h2>
    </x-slot>

    <div class="mx-auto mt-6 flex justify-center items-center space-x-4">
        <livewire:salescount />
        <livewire:total-incomes />
    </div>

    <div class="mt-6 max-w-3xl mx-auto">
        <livewire:month-table />
    </div>
    <div class="mt-6 max-w-3xl mx-auto">
        <livewire:incomes-chart />
    </div>

</x-app-layout>
