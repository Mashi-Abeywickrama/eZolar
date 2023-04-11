<?php
// define('__ROOT__', dirname(dirname(dirname(__FILE__))));
// require_once(__ROOT__.'\app\views\Includes\header.php');
require_once(__ROOT__.'\app\views\Customer\navbar.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\salesperson.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\employees.css">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <title>My Projects</title>
</head>
<body>

<div class="body-container">
    <div class="left-panel">
    <a href="<?=URLROOT?>/user/dashboard"><div class ="box1">
            Salesperson Dashboard
        </div></a>
        <div class="rest">
            <div class="rest-top">
            <a href="<?=URLROOT?>/Project/SalespersonViewProjects"><div class="box7">
                    Assigned Projects
                </div></a>
            <a href="/ezolar/Inquiry/viewSalesperson"><div class="box2">
                    Inquiries
            </div></a>
            <a href="<?=URLROOT?>/inquiry"><div class="box3">
                Inspection Schedule
            </div></a>
            <div class="box4">
                Delivery Schedule
            </div>
            
            <a href="/ezolar/Employee/EngineersAndContractors"><div class="box8">
            Engineers & Contractors
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
        <div class="common-main-left-img">
            <a href="ezolar" “text-decoration: none”>
                <img src="\ezolar\public\img\admin\employees.png" alt="employee-icon">
            </a>
        </div>
        <div class="common-main-txt">
            Employees
        </div>

        <div class="common-main-right-img">
            <img src="\ezolar\public\img\profile.png" alt="profile">
        </div>
    </div>


    <div class="dashboard-container">
        <a href="/ezolar/Employee/getEmployees/engineer">

            <div class="dashboard-container-content">
                <div class="dashboard-container-txt">
                    Engineers
                </div>
            </div>
        </a>

        <a href="/ezolar/Employee/getEmployees/contractor">
            <div class="dashboard-container-content">
                <div class="dashboard-container-txt">
                    Contractors
                </div>
            </div>
        </a>


    </div>
</div>
</div>
<div class="f">
    <?php
        require_once(__ROOT__.'\app\views\Includes\footer.php');
    ?>
</div>
</body>
</html>
