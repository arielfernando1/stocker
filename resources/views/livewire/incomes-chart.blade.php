<div>
    <div>
        <input type="number" wire:model.live="year" min="2018" max="2030">
        <canvas wire:ignore id="incomesChart"></canvas>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('incomesChart');

        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                datasets: [{
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
                        beginAtZero: true
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
