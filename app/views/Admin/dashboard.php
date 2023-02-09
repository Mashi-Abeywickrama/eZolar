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
    <link rel="stylesheet" href="\ezolar\public\css\admin\admin.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\admin\admin.dashboard.css">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <title>eZolar Dashboard</title>
</head>
<body>
<div class="dashboard-container">
        <div class="dashboard-container-main">
        <div class="main-txt">
                <b>Admin Dashboard</b>
        </div>
        <div class="main-img">
                <img src="\ezolar\public\img\profile.png" alt="profile">
        </div>
        </div>
        <div class="dashboard-container-nav" align="center">
        
        <a href="/ezolar/Employee">
            <div class="dashboard-container-content">
                <div class="dashboard-container-txt" >
                Employees
                </div>
                <div class="dashboard-container-img">
                        <img src="\ezolar\public\img\admin\employees.png" alt="employee">
                </div>
            </div>
            </a>
        
            
            <div class="dashboard-container-content">
                <div class="dashboard-container-txt">
                        Packages
                </div>
                <div class="dashboard-container-img">
                        <img src="\ezolar\public\img\admin\packages.png" alt="packages">
                </div>
            </div>

            <div class="dashboard-container-content">
                <div class="dashboard-container-txt">
                        Products
                </div>
                <div class="dashboard-container-img">
                        <img src="\ezolar\public\img\admin\products.png" alt="products">
                </div>
            </div>

            <div class="dashboard-container-content">
                <div class="dashboard-container-txt">
                        Reports
                </div>
                <div class="dashboard-container-img">
                        <img src="\ezolar\public\img\admin\reports.png" alt="reports">
                </div>
            </div>

            <a href="/ezolar/AdminViewProfile">
                <div class="dashboard-container-content">
                    <div class="dashboard-container-txt">
                            Profile
                    </div>
                    <div class="dashboard-container-img">
                            <img src="\ezolar\public\img\admin\profile.png" alt="profile">
                    </div>
                </div>
            </a>
            
            <div class="dashboard-container-content">
                <div class="dashboard-container-txt">
                        Settings
                </div>
                <div class="dashboard-container-img">
                        <img src="\ezolar\public\img\admin\settings.png" alt="settings">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
