<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Inventario
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap">
            <div class="w-full sm:w-1/2 xl:w-1/3 p-6">
                <x-dashboard-card :data="$itemCount" :label="'Productos'" :route="'items.index'" />
            </div>
            <div class="w-full sm:w-1/2 xl:w-1/3 p-6">
                <x-dashboard-card :data="$categoryCount" :label="'Categorias'" :route="'categories.index'" />
            </div>
        </div>
    </div>
</x-app-layout>
