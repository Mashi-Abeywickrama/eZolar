<?php
    //  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
     require_once(__ROOT__.'\app\views\Includes\header.php');
     require_once(__ROOT__.'\app\views\Includes\navbar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\customer.project.css">
    <title>My Projects</title>
</head>
<body>

<div class="left-panel">
        <div class ="box1">
            Customer Dashboard
        </div>
        <div class="rest">
            <div class="rest-top">
            <a href="<?=URLROOT?>/project"><div class="box2">
                    My Projects
                </div></a>
                <a href="<?=URLROOT?>/inquiry"><div class="box3">
                    Inquiries
                </div></a>
                <div class="box4">
                    Transactions
                </div>
            </div>
            <div class="rest-bottom">
                <div class="box5">
                    Profile
                </div>
                <div class="box6">
                    Settings
                </div>
            </div>
        </div>
    </div>

    <div class="common-main-container">
        <div class="dashboard-common-main-topic">
            <div class="common-main-left-img">
                <a href=”#” “text-decoration: none”>
                    <img src="\ezolar\public\img\customer\projects.png" alt="project">
                </a>
            </div>
            <div class="common-main-txt">
                My Projects
            </div>
            
            <div class="common-main-right-img">
                <img src="\ezolar\public\img\profile.png" alt="profile">
            </div>   
        </div>
            <div class="dashboard-common-heading-container">
                <div class="dashboard-common-heading-back-btn">
                    <a href=”” “text-decoration: none”>
                        <img src="\ezolar\public\img\storekeeper\Back.png">
                    </a>
                </div>
                <div class="dashboard-common-heading-text">
                    <b>Ongoing Project Details</b>
                </div>
            </div>
        <div class="dashboard-main-container">
            <div class="project-progress-bar-wrapper">
                <div class="project-progress-bar-container">
                    <div class="project-progress-bar-bullet-container">
                        <div class="project-progress-bar-bullet"></div>
                        <div class="project-progress-bar-bullet-text">Request Recieved</div>
                    </div>
                    <div class="project-progress-bar-bullet-container">
                        <div class="project-progress-bar-bullet"></div>
                        <div class="project-progress-bar-bullet-text">Inspection Scheduling</div>
                    </div>
                    <div class="project-progress-bar-bullet-container">
                        <div class="project-progress-bar-bullet"></div>
                        <div class="project-progress-bar-bullet-text">Inspection</div>
                    </div>
                    <div class="project-progress-bar-bullet-container">
                        <div class="project-progress-bar-bullet"></div>
                        <div class="project-progress-bar-bullet-text">Payment & Scheduling</div>
                    </div>
                    <div class="project-progress-bar-bullet-container">
                        <div class="project-progress-bar-bullet"></div>
                        <div class="project-progress-bar-bullet-text">Delivery & Installation</div>
                    </div>
                </div>
                <div class="project-progress-bar"></div>
            </div>
            <div class="project-details-inline">
                <div class="project-details-steps-container">
                    <span class="project-details-steps-text-colored"><img src="\ezolar\public\img\customer\projectStepTick2.png" class="project-details-steps-tick">Make Request</span>
                    <span class="project-details-steps-text"><img src="\ezolar\public\img\customer\projectStepTick1.png" class="project-details-steps-tick">Await Request Processing</span>
                    <span class="project-details-steps-text"><img src="\ezolar\public\img\customer\projectStepTick1.png" class="project-details-steps-tick">Request Response</span>
                </div>
                <div class="project-details-info-container">
                    <b>Project No:</b> 123556 <br>
                    <b>Site Location:</b> 158, Puhulyaya Road, Ambalantota <br>
                    <b>Package:</b> Pending <br>
                    <b>Contractor:</b> Pending <br>
                    <b>Status:</b> Ongoing <br>
                    <b>Scheduled Dates:</b> None<br>
                </div>
            </div>
            <div class="project-details-btn-container">
                <div class="add-project-btn">
                    <div class="add-project-btn-text">
                    <a href="/ezolar/project/requestProjectPage">Make Payment</a> 
                    </div>
                </div>
                <div class="add-project-btn">
                    <div class="add-project-btn-text">
                    <a href="/ezolar/project/requestProjectPage">Schedule</a> 
                    </div>
                </div>
                <div class="add-project-btn">
                    <div class="add-project-btn-text">
                    <a href="/ezolar/project/requestProjectPage">Send Inquiry</a> 
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</body>
<?php 
      $this->view('Includes/footer', $data);
?>
</html>