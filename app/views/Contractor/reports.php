<?php
// print_r($data['completed']);die();
    //  define('__ROOT__', dirname(dirname(dirname(__FILE__))));

require_once(__ROOT__.'\app\views\Customer\navbar.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\contractor.report.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
</head>
<body>
<div class = "body-container-main">    
<div class="body-container">
    <?php
        require_once(__ROOT__.'\app\views\Contractor\navigationpanel.php');
    ?>
    <div class="common-main-container">
        <div class="dashboard-common-main-topic">
            <div class="common-main-topic-left">
                <div class="common-main-left-img">
                    <img src="\ezolar\public\img\customer\Person.png" alt="profile">
                </div>
                <div class="common-main-txt">
                    Reports and Charts
                </div>
            </div>
            
        </div>
        
    
    <div class="chart">
    <canvas id="myChart" style="width:100%;max-width:800px"></canvas>

    <script>

        new Chart("myChart", {
            type: "line",
            data: {
                labels: <?php 
                            $values = array_keys($data['completed']);
                            echo json_encode($values);
                        ?>,
                datasets: [{
                    label:'Completed Projects',
                    data: <?php 
                                $values = array_values($data['completed']);
                                echo json_encode($values);
                            ?>,
                    borderColor: "red",
                    fill: false
                }, {
                    label:'Total projects',
                    data:  <?php 
                                $values = array_values($data['total']);
                                echo json_encode($values);
                            ?>,
                    borderColor: "blue",
                    fill: false
                }]
            },
            options: {
                legend: {
                    display: true
                },
                scales:{
                    yAxes:[{
                        scaleLabel:{
                            display:true,
                            labelString:'Project count'
                        }
                    }],
                    xAxes:[{
                        scaleLabel:{
                            display:false,
                            labelString:'Month'
                        }
                    }]
                }
            }
        });
    </script>

</div>
</div>

</div>
</div>
<div class = "f">
    <?php 
          $this->view('Includes/footer', $data);
    ?>
</div>

</body>
</html>