<x-form-section submit="update">

    <x-slot name="title">
        {{ __('Reportes') }}

    </x-slot>
    <x-slot name="description">
        {{ __('Preferencias de envio de reportes') }}
    </x-slot>
    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for=report_hour value="{{ __('Hora de envio de reportes') }}" />
            <x-input id="report_hour" type="time" class="mt-1 block w-full" wire:model="report_hour" required />
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
