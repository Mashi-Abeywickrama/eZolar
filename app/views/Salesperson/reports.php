<?php
require_once(__ROOT__.'\app\views\Customer\navbar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\salesperson.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\reports.css">
    <title>My Projects</title>
</head>
<div>

<div class="body-container">
    <div class="left-panel">
        <a href="<?=URLROOT?>/user/dashboard"><div class ="box1">
            Salesperson Dashboard
        </div></a>
        <div class="rest">
            <div class="rest-top">
            <a href="<?=URLROOT?>/SalespersonProject"><div class="box7">
                Assigned Projects
            </div></a>
            <a href="<?=URLROOT?>/Inquiry/getSalespersonInquiries"><div class="box2">
                Inquiries
            </div></a>
            <a href="<?=URLROOT?>/SalespersonSchedules/InspectionSchedule"><div class="box3">
                Inspection Schedule
            </div></a>
            <a href="<?=URLROOT?>/SalespersonSchedules/DeliverySchedule"><div class="box4">
                Delivery Schedule
            </div></a>
            
            <a href="<?=URLROOT?>/Employee/EngineersAndContractors"><div class="box8">
                Engineers & Contractors
            </div></a>

            <a href="<?=URLROOT?>/SalespersonReports"><div class="box9">
                Reports
            </div></a>

        </div>
        <div class="rest-bottom">
            <a href="<?=URLROOT?>/user/profile"><div class="box5">
                Profile
            </div></a>
            <a href="<?=URLROOT?>/"><div class="box6">
                Settings
            </div></a>
            </div>
        </div>
    </div>

    <div class="common-main-container">
        <div class="dashboard-common-main-topic">
            <div class = "common-main-topic-left">
                <div class="common-main-left-img">
                    <a href=”#” “text-decoration: none”>
                        <img src="\ezolar\public\img\salesperson\reports.png" alt="reports">
                    </a>
                </div>
                <div class="common-main-txt">
                    Reports
                </div>
            </div>
        </div>

        <div class="charts">
            <div class="Interaction">
                <canvas id="SalespersonInteraction"></canvas>
            </div>
        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script
        message_count="<?php echo htmlspecialchars(json_encode($_SESSION['message_count'])); ?>"
        weeks="<?php 
        foreach($_SESSION['weeks'] as $index => $week){
            $timestamp = strtotime($week[0]);
            $formattedDate = date('F jS', $timestamp);
            $timestamp = strtotime($week[1]);
            $formattedDate .= ' - '.date('F jS', $timestamp);
            $_SESSION['weeks'][$index] = $formattedDate;
        }
        echo htmlspecialchars(json_encode($_SESSION['weeks'])); ?>">

var weeks_data = JSON.parse(document.currentScript.getAttribute('weeks'));

var message_count_data = JSON.parse(document.currentScript.getAttribute('message_count'));
var interaction = document.getElementById('SalespersonInteraction').getContext('2d');
var myChart = new Chart(interaction, {
  type: 'bar',
  data: {
    labels: weeks_data,
    datasets: [{
      label: 'Weekly Interaction',
      data: message_count_data,
      backgroundColor: 'rgba(255, 99, 132, 0.2)',
      borderColor: 'rgba(255, 99, 132, 1)',
      borderWidth: 1
    }]
  },
  options: {
        scales: {
            y: {
                display: true,
                beginAtZero: true,
            }
        },
        plugins: {
            subtitle: {
                display: true,
                text: 'Weekly Interaction with Cutomers',
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
</script>
<?php unset($_SESSION['message_count'],$_SESSION['weeks'])?>
<div class = "f">
<?php
$this->view('Includes/footer', $data);
?>
</div>
</body>
</html>



