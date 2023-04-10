var ctx = document.getElementById('myChart').getContext('2d');
var salesData = JSON.parse(document.currentScript.getAttribute('data-data'));
// var labels = JSON.parse(document.currentScript.getAttribute('data-labels'));

// var salesData = {
//     labels: [],
//     datasets: [{
//         label: 'Number of Schedules',
//         data: [],
//         backgroundColor: 'rgba(255, 99, 132, 0.2)',
//         borderColor: 'rgba(255, 99, 132, 1)',
//         borderWidth: 1
//     }]
// };

var labels = [];
var data = [];

for (var i = 0; i < 12; i++) {
    var month = (new Date(2000, i)).toLocaleString('default', { month: 'long' });
    // var month = labels[i]
    // var monthLabel = labels[i].toLocaleString('default', { month: 'short' });
    console.log(labels)
    var sales = 0;

    for (var j = 0; j < salesData.length; j++) {
        if (salesData[j].month === month) {
            sales = salesData[j].count;
            break;
        }
    }

    labels.push(month);
    data.push(sales);
}

var salesPerMonth = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Sales per Month',
            data: data,
            backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                display: true,
                beginAtZero: true,
                suggestedMin:0,
                suggestedMax:10
            }
        },
        title: {
            display: true,
            text: 'Sales Per Month'
        }
    }
});

// data.forEach(function(item) {
//
//     for (var i = 0; i < 12; i++) {
//         var month = labels[i];
//         var sales = 0;
//
//         for (var j = 0; j < salesData.length; j++) {
//             if (salesData[j].month === month) {
//                 sales = salesData.datasets[0].data;
//                 break;
//             }
//         }

        // labels.push(month);
        // data.push(count);

        // salesData.labels.push(item.month);
        // salesData.datasets[0].data.push(item.count);
//     for (var i = 0; i < labels.length; i++) {
//         if (!labels.includes(labels[i])) {
//             labels.splice(i, 0, labels[i]);
//             data.splice(i, 0, 0);
//         }
// }
//     }
//
// });



// var salesPerMonth = new Chart(ctx, {
//     type: 'bar',
//     data: salesData,
//     options: {
//         scales: {
//             yAxes: [{
//                 ticks: {
//                     beginAtZero: true,
//                     min: 0,
//                     max: 20,
//                     step:5
//                 }
//             }]
//         }
//     }
// });

// labels = salesPerMonth.data.labels;
// data = salesPerMonth.data.datasets[0].data;
// for (var i = 0; i < labels.length; i++) {
//     if (!labels.includes(labels[i])) {
//         labels.splice(i, 0, labels[i]);
//         data.splice(i, 0, 0);
//     }
// }
// salesPerMonth.update();




