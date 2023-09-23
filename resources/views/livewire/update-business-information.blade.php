<x-form-section submit="updateBusinessInfo">

    <x-slot name="title">
        {{ __('Informacion de la empresa') }}

    </x-slot>
    <x-slot name="description">
        {{ __('Actualiza la información de tu empresa') }}
    </x-slot>
    <x-slot name="form">
        <!-- Business name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Nombre') }}" />
            <x-input id="business.name" type="text" class="mt-1 block w-full" wire:model="name" required />
            <x-input-error for="name" class="mt-2" />
        </div>
        <!-- Business address -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="address" value="{{ __('Dirección') }}" />
            <x-input id="address" type="text" class="mt-1 block w-full" wire:model="address" required
                autocomplete="business.address" />
            <x-input-error for="address" class="mt-2" />
        </div>
        <!-- Business phone -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="phone" value="{{ __('Teléfono') }}" />
            <x-input id="phone" type="text" class="mt-1 block w-full" wire:model="phone" required />
            <x-input-error for="phone" class="mt-2" />
        </div>
        <!-- Business email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Correo electrónico') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="email" required />
            <x-input-error for="email" class="mt-2" />
        </div>
        <!-- Business RUC -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('RUC') }}" />
            <x-input id="email" type="text" class="mt-1 block w-full" wire:model="ruc" required />
            <x-input-error for="email" class="mt-2" />
        </div>
        <!-- Business Logo -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="logo" value="{{ __('Logo') }}" />
            <x-input id="logo" type="file" class="mt-1 block w-full" wire:model="logo" />
            <x-input-error for="logo" class="mt-2" />
        </div>
        <!-- Business website -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="website" value="{{ __('Sitio web') }}" />
            <x-input id="website" type="text" class="mt-1 block w-full" wire:model="web" />
            <x-input-error for="website" class="mt-2" />
        </div>
        <x-slot name="actions">
            <x-action-message class="mr-3" on="saved">
                {{ __('Guardado.') }}
            </x-action-message>
            <x-button>
                {{ __('Guardar') }}
            </x-button>
        </x-slot>
    </x-slot>
</x-form-section>
