<?php
// define('__ROOT__', dirname(dirname(dirname(__FILE__))));
    require_once(__ROOT__.'/app/views/Includes/header.php');
    require_once(__ROOT__.'/app/views/Includes/navbar.php');
    require_once(__ROOT__.'/app/views/Includes/footer.php');

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

<div class="sidebar">
    <div class="sidebar-heading">
        <b>Salesperson Dashboard</b>
    </div>
    <div class="sidebar-link-container-group">
        <div class="sidebar-link-container-top">
            <a href="/ezolar/Project/SalespersonAssignedProjects"><div class="sidebar-link-container">
                    Assigned Projects
                </div></a>
            <a href="/ezolar/Inquiry/viewSalesperson">
                <div class="sidebar-link-container">
                    Inquiries
                </div>
            </a>
            <div class="sidebar-link-container">
                Inspection Schedule
            </div>
            <div class="sidebar-link-container">
                Delivery Schedule
            </div>
            <div class="sidebar-link-container-selected">
                Engineers & Contractors
            </div>
        </div>

        <div class="sidebar-link-container-bottom">
            <a href="/ezolar/AdminViewProfile"><div class="sidebar-link-container">
                    Profile
                </div></a>
            <div class="sidebar-link-container">
                Settings
            </div>
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
</body>
</html>
