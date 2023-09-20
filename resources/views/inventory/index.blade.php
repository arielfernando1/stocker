<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Inventario
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap">
            <div class="w-full sm:w-1/2 xl:w-1/3 p-6">
                <div class="bg-white border-transparent rounded-lg shadow-xl">
                    <div
                        class="bg-gray-400 uppercase text-gray-800 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                        <h5 class="font-bold uppercase text-gray-600">Productos</h5>
                    </div>
                    <div class="p-5">
                        <div class="flex flex-wrap">
                            <div class="w-full">
                                <div class="text-center">
                                    <h5 class="text-gray-500 uppercase font-bold">Total</h5>
                                    <h3 class="font-bold text-3xl">{{ $itemCount }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-gray-400 uppercase text-gray-800 border-t-2 border-gray-500 rounded-bl-lg rounded-br-lg p-2">
                        <a href="{{ route('items.index') }}" class="text-gray-800 hover:text-gray-600  font-bold">Ver
                            productos</a>
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-1/2 xl:w-1/3 p-6">
                <div class="bg-white border-transparent rounded-lg shadow-xl">
                    <div
                        class="bg-gray-400 uppercase text-gray-800 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                        <h5 class="font-bold uppercase text-gray-600">Categorías</h5>
                    </div>
                    <div class="p-5">
                        <div class="flex flex-wrap">
                            <div class="w-full">
                                <div class="text-center">
                                    <h5 class="text-gray-500 uppercase font-bold">Total</h5>
                                    <h3 class="font-bold text-3xl">{{ $categoryCount }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-gray-400 uppercase text-gray-800 border border-gray-500 rounded-bl-lg rounded-br-lg p-2">
                        <a href="{{ route('categories.index') }}"
                            class="text-gray-800 hover:text-gray-600  font-bold">Ver categorías</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
