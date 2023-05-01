var salesChart = document.getElementById('salesPerMonthChart').getContext('2d');
var packageChart = document.getElementById('packagesSoldChart').getContext('2d');
var scheduleChart = document.getElementById('SchedulesPerMonthChart').getContext('2d');
var salesData = JSON.parse(document.currentScript.getAttribute('data-data'));
var PreviousSalesData = JSON.parse(document.currentScript.getAttribute('data-previous'));
var packageData = JSON.parse(document.currentScript.getAttribute('data-packages'));
var inspectionData = JSON.parse(document.currentScript.getAttribute('data-inspection'));
var deliveryData = JSON.parse(document.currentScript.getAttribute('data-delivery'));


// sales per month chart
var labels = [];
var data = [];
console.log("sales : " + salesData);
for (var i = 0; i < 12; i++) {
    var month = (new Date(2000, i)).toLocaleString('default', { month: 'long' });
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

var labelsPrev = [];
var dataPrev = [];
console.log("sales : " + PreviousSalesData);
for (var i = 0; i < 12; i++) {
    var month = (new Date(2000, i)).toLocaleString('default', { month: 'long' });
    // var month = labels[i]
    // var monthLabel = labels[i].toLocaleString('default', { month: 'short' });
    console.log(labels)
    var sales = 0;

    for (var j = 0; j < PreviousSalesData.length; j++) {
        if (PreviousSalesData[j].month === month) {
            sales = PreviousSalesData[j].count;
            break;
        }
    }

    labelsPrev.push(month);
    dataPrev.push(sales);
}


// var salesPerMonth = new Chart(salesChart, {
//     type: 'bar',
//     data: {
//         labels: labels,
//         datasets: [{
//             label: 'Sales per Month',
//             data: data,
//             backgroundColor: 'rgba(54, 162, 235, 0.5)',
//             borderColor: 'rgba(54, 162, 235, 1)',
//             borderWidth: 1
//         }]
//     },
//     options: {
//         scales: {
//             y: {
//                 display: true,
//                 beginAtZero: true,
//                 suggestedMin:0,
//                 suggestedMax:10
//             }
//         },
//         plugins: {
//             subtitle: {
//                 display: true,
//                 text: 'Sales Per Month',
//                 font: {
//                     size: 22 // Change font size here
//                 },
//                 color: '#DE8500',
//                 padding: {
//                     top: 10,
//                     bottom: 30
//                 }
//             }
//         }

//     }
// }

var salesPerMonth = new Chart(salesChart,  {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Current Year',
            data: data,
            // backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        },
            {
                label: 'Previous Year',
                data: dataPrev,
                // backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }
        ],

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
        plugins: {
            subtitle: {
                display: true,
                text: 'Sales Per Month',
                font: {
                    size: 22 // Change font size here
                },
                color: '#DE8500',
                padding: {
                    top: 10,
                    bottom: 30
                }
            }
        }
    }
}

);


// Pie Chart for packages sold

var packageNames = [];
var packageCount = [];

for (var k = 0; k < packageData.length; k++) {
    var names = packageData[k].name;
    var counts = packageData[k].packageCount;
    packageNames.push(names);
    packageCount.push(counts);
    }

// generating random colours to pie chart

let randomBackgroundColor = [];
let usedColors = new Set();

let dynamicColors = function() {
    let r = Math.floor(Math.random() * 255);
    let g = Math.floor(Math.random() * 255);
    let b = Math.floor(Math.random() * 255);
    let color = "rgb(" + r + "," + g + "," + b + ")";

    if (!usedColors.has(color)) {
        usedColors.add(color);
        return color;
    } else {
        return dynamicColors();
    }
};

for (let i in data) {
    randomBackgroundColor.push(dynamicColors());
}

var packagesSold = new Chart(packageChart, {
    type: 'pie',
    animationEnabled: true,
    data: {
        labels: packageNames,
    datasets: [{
        data: packageCount,
        backgroundColor: randomBackgroundColor,
        borderWidth: 1
    }]
    },
    options: {
        responsive: true,
            maintainAspectRatio: false,
        plugins: {
            subtitle: {
                display: true,
                text: 'Packages Sales',
                font: {
                    size: 22 // Change font size here
                },
                color: '#DE8500',
                padding: {
                    top: 10,
                    bottom: 30
                }
            }
        }
    }

});


// chart for schedules per month

var monthLabelsIns = [];
var inspectionList = [];
console.log("sales : " + salesData);
for (var x = 0; x < 12; x++) {
    var monthX = (new Date(2000, x)).toLocaleString('default', { month: 'long' });

    var inspections = 0;

    for (var y = 0; y < inspectionData.length; y++) {
        if (inspectionData[y].month === monthX) {
            inspections = inspectionData[y].count;
            break;
        }
    }

    monthLabelsIns.push(monthX);
    inspectionList.push(inspections);
}

var monthLabelsDel = [];
var deliveryList = [];
console.log("sales : " + salesData);
for (var z = 0; z < 12; z++) {
    var monthZ = (new Date(2000, z)).toLocaleString('default', { month: 'long' });

    var deliveries = 0;

    for (var r = 0; r < deliveryData.length; r++) {
        if (deliveryData[r].month === monthZ) {
            deliveries = deliveryData[r].count;
            break;
        }
    }

    monthLabelsDel.push(monthZ);
    deliveryList.push(deliveries);
}

var schedulesPerMonth = new Chart(scheduleChart, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Inspection',
            data: inspectionList,
            // backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        },
            {
                label: 'deliveries',
                data: deliveryList,
                // backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }
        ],

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
        plugins: {
            subtitle: {
                display: true,
                text: 'Schedules Per Month',
                font: {
                    size: 22 // Change font size here
                },
                color: '#DE8500',
                padding: {
                    top: 10,
                    bottom: 30
                }
            }
        }
    }
});








