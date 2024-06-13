document.addEventListener('DOMContentLoaded', (event) => {
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: 'Commercial',
                data: [],  // Initialize as empty array
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                fill: true,
            },
            {
                label: 'Residential',
                data: [],  // Initialize as empty array
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                fill: true,
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function (value) {
                            return value.toLocaleString(); // Convert number to string with comma separator
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                }
            }
        }
    });

    function fetchData(year) {
        fetch('get_water_rates.php?year=${year}')
            .then(response => response.json())
            .then(data => {
                console.log('Fetched data:', data); // Log fetched data
                salesChart.data.datasets[0].data = data.commercial;
                salesChart.data.datasets[1].data = data.residential;
                salesChart.update();
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    // Initial load
    fetchData(document.getElementById('yearSelect').value);

    document.getElementById('yearSelect').addEventListener('change', function () {
        fetchData(this.value);
    });
});