var ctx = document.getElementById('myChart').getContext('2d');

var data = {
  labels: ['1st', '2nd', '3rd'],
  datasets: [{
    label: 'Podium Chart',
    data: [80, 60, 40],
    backgroundColor: [
      'gold',
      'silver',
      'brown'
    ],
    borderWidth: 1
  }]
};

var options = {
  responsive: true,
  plugins: {
    legend: {
      display: false
    },
    title: {
      display: true,
      text: 'Monthly Sales Podium'
    }
  },
  scales: {
    yAxes: [{
      ticks: {
        beginAtZero: true
      }
    }]
  }
};

var myChart = new Chart(ctx, {
  type: 'bar',
  data: data,
  options: options
});
