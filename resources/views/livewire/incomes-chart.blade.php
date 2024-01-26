<div>
    <div class="flex items-center justify-between mb-4">
        <label for="year" class="mr-2">Selecciona el año:</label>
        <input type="number" id="year" wire:model.live="year" min="2018" max="2030" class="border p-2">
    </div>

    <div class="relative">
        <canvas wire:ignore id="incomesChart" style="max-height: 400px;"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('incomesChart');

        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                datasets: [{
                    label: 'Ingresos Por Mes',
                    data: @json($incomes),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value, index, values) {
                                return '$' + value;
                            }
                        }
                    }
                }
            }
        });

        document.addEventListener('livewire:init', () => {
            Livewire.on('refreshChart', () => {
                chart.data.datasets[0].data = @this.incomes;
                chart.update();
            });
        });
    </script>
</div>
