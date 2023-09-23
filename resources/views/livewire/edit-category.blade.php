<div class="p-4">
    <form wire:submit="save" class="space-y-4">
        <input type="text" wire:model="name" class="w-full p-2 border border-gray-300 rounded-md">
        <input type="text" wire:model="description" class="w-full p-2 border border-gray-300 rounded-md">
        <button type="submit" class="w-full p-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Guardar</button>
    </form>
</div>
