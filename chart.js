document.addEventListener('DOMContentLoaded', (event) => {
    const comm = {
      '2006': [10, 43, 23, 40, 37, 70, 63, 77, 92, 88, 85, 82],
      '2009': [100, 92, 84, 88, 86, 90, 94, 98, 10, 10, 1, 11],
      '2012': [100, 97, 95, 93, 90, 88, 85, 83, 80, 78, 75, 73],
      '2015': [100, 97, 93, 90, 87, 83, 80, 77, 73, 70, 67, 63],
      '2018': [100, 97, 94, 91, 88, 85, 82, 79, 76, 73, 70, 67],
      '2021': [100, 97, 93, 90, 87, 83, 80, 77, 73, 70, 67, 63]
    }
    const res = {
      '2006': [95, 89, 79, 75, 83, 88, 90, 93, 88, 85, 80, 78],
      '2009': [110, 105, 100, 98, 95, 92, 88, 85, 80, 78, 75, 70],
      '2012': [90, 85, 80, 77, 75, 73, 70, 68, 65, 63, 60, 58],
      '2015': [85, 80, 75, 70, 68, 65, 63, 60, 58, 55, 53, 50],
      '2018': [75, 70, 65, 63, 60, 58, 55, 53, 50, 48, 45, 43],
      '2021': [80, 75, 70, 68, 65, 63, 60, 58, 55, 53, 50, 48]
    };

    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [{
          label: 'Commercial',
          data: comm['2006'],
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          fill: true,
        },
        {
          label: 'Residential',
          data: res['2006'],
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          borderColor: 'rgba(54, 162, 235, 1)',
          fill: true,
        },
        ]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              callback: function (value) {
                return value.toLocaleString(); // convert number to string with comma separator
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

    document.getElementById('yearSelect').addEventListener('change', function () {
      const selectedYear = this.value;
      salesChart.data.datasets[0].data = comm[selectedYear];
      salesChart.data.datasets[1].data = res[selectedYear];
      salesChart.update();
    });
  });