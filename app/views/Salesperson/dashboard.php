<?php
//      define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__.'\app\views\Includes\header.php');
require_once(__ROOT__.'\app\views\Includes\navbar.php');
require_once(__ROOT__.'\app\views\Includes\footer.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\salesperson.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\salesperson.dashboard.css">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <title>eZolar Dashboard</title>
</head>
<body>
<div class="dashboard-container">
    <div class="dashboard-container-main">
        <div class="main-txt">
            <b>Salesperson Dashboard</b>
        </div>
        <div class="main-img">
            <img src="\ezolar\public\img\profile.png" alt="profile">
        </div>
    </div>
    <div class="dashboard-container-nav" align="center">

        <a href="/ezolar/Project/SalespersonAssignedProjects">
            <div class="dashboard-container-content">
                <div class="dashboard-container-txt" >
                    Assigned Projects
                </div>
                <div class="dashboard-container-img">
                    <img src="\ezolar\public\img\salesperson\assignedProjects.png" alt="assigned-projects">
                </div>
            </div>
        </a>

        <a href="/ezolar/Inquiry/viewSalesperson">
            <div class="dashboard-container-content">
                <div class="dashboard-container-txt">
                    Inquiries
                </div>
                <div class="dashboard-container-img">
                    <img src="\ezolar\public\img\salesperson\inquiries.png" alt="inquiries">
                </div>
            </div>
        </a>

        <a href="/ezolar/Schedules/Insepection">
            <div class="dashboard-container-content">
                <div class="dashboard-container-txt">
                    Inspection Schedule
                </div>
                <div class="dashboard-container-img">
                    <img src="\ezolar\public\img\salesperson\schedule.png" alt="inspection-schedule">
                </div>
            </div>
        </a>

        <a href="/ezolar/Schedules/Delivery">
            <div class="dashboard-container-content">
                <div class="dashboard-container-txt">
                    Delivery Schedule
                </div>
                <div class="dashboard-container-img">
                    <img src="\ezolar\public\img\salesperson\schedule.png" alt="delivery-schedule">
                </div>
            </div>
        </a>

        <a href="/ezolar/Employee/EngineersAndContractors">
            <div class="dashboard-container-content">
                <div class="dashboard-container-txt">
                    Engineers & Contractors
                </div>
                <div class="dashboard-container-img">
                    <img src="\ezolar\public\img\salesperson\employees.png" alt="employees">
                </div>
            </div>
        </a>

        <a href="/ezolar/AdminViewProfile">
            <div class="dashboard-container-content">
                <div class="dashboard-container-txt">
                    Profile
                </div>
                <div class="dashboard-container-img">
                    <img src="\ezolar\public\img\salesperson\profile.png" alt="profile">
                </div>
            </div>
        </a>

        <div class="dashboard-container-content">
            <div class="dashboard-container-txt">
                Settings
            </div>
            <div class="dashboard-container-img">
                <img src="\ezolar\public\img\salesperson\settings.png" alt="settings">
            </div>
        </div>
    </div>
</div>
</body>
</html>
