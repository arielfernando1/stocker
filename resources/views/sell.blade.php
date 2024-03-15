<x-app-layout>
    <div class="rounded-xl flex flex-col items-center space-y-4 dark:bg-gray-700 dark:text-gray-300 ">
        <livewire:sell-form />
    </div>
    <script>
        document.addEventListener('livewire:init', function() {
            Livewire.on('noStock', () => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No hay suficiente stock',
                    timer: 1500,
                    timerProgressBar: true,
                })
            });
        });
    </script>
</x-app-layout>
