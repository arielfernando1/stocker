<div>
    <div>
        <canvas id="incomesChart"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('incomesChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: Object.keys(@json($incomes)),
                datasets: [{
                    label: 'Ingresos',
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
    </script>

</div>
