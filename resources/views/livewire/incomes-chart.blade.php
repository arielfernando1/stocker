<div>
    <div>
        <input type="number" wire:model.live="year" min="2018" max="2030">
        <canvas wire:ignore id="incomesChart"></canvas>

    </div>
    @assets
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @endassets
    @script
        <script>
            const ctx = document.getElementById('incomesChart');

            const chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    datasets: [{
                        data: $wire.incomes,
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

            $wire.on('refreshChart', () => {
                chart.data.datasets[0].data = $wire.incomes;
                chart.update();
            });
        </script>
    @endscript

</div>
