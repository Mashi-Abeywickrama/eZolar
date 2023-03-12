var ctx = document.getElementById('myChart').getContext('2d');
var data = JSON.parse(document.currentScript.getAttribute('data-data'));
var labels = JSON.parse(document.currentScript.getAttribute('data-labels'));
var chartData = {
    labels: [],
    datasets: [{
        label: 'Number of Schedules',
        data: [],
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1
    }]
};

data.forEach(function(item) {
    chartData.labels.push(item.month);
    chartData.datasets[0].data.push(item.count);
});

var myChart = new Chart(ctx, {
    type: 'bar',
    data: chartData,
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    min: 0,
                    max: 20,
                    step:5
                }
            }]
        }
    }
});




