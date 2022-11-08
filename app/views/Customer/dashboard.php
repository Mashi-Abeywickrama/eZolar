<?php
     define('__ROOT__', dirname(dirname(dirname(__FILE__))));
     require_once(__ROOT__.'\views\Includes\header.php');
     require_once(__ROOT__.'\views\Includes\navbar.php');
     require_once(__ROOT__.'\views\Includes\footer.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.css">
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.common.css">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <title>eZolar Dashboard</title>
</head>
<body>
    <!-- <p>Working</p> -->
    <div class="dashboard-container">
        <div class="dashboard-container-main">
           <div class="main-txt">
                Customer Dashboard
           </div>
           <div class="main-img">
                <img src="\ezolar\public\img\profile.png" alt="profile">
           </div>
        </div>
        <div class="dashboard-container-content">
           <div class="dashboard-container-txt">
                My Projects
           </div>
           <div class="dashboard-container-img">
                <img src="\ezolar\public\img\customer\Projects.png" alt="profile">
           </div>
        </div>
        <div class="dashboard-container-content">
           <div class="dashboard-container-txt">
                Inquiries
           </div>
           <div class="dashboard-container-img">
                <img src="\ezolar\public\img\customer\Inquiry.png" alt="profile">
           </div>
        </div>
        <div class="dashboard-container-content">
           <div class="dashboard-container-txt">
                Transactions
           </div>
           <div class="dashboard-container-img">
                <img src="\ezolar\public\img\customer\Cash.png" alt="profile">
           </div>
        </div>
        <div class="dashboard-container-content">
           <div class="dashboard-container-txt">
                Profile
           </div>
           <div class="dashboard-container-img">
                <img src="\ezolar\public\img\customer\Person.png" alt="profile">
           </div>
        </div>
        <div class="dashboard-container-content">
           <div class="dashboard-container-txt">
                Settings
           </div>
           <div class="dashboard-container-img">
                <img src="\ezolar\public\img\customer\Setting.png" alt="profile">
           </div>
        </div>
    </div>
</body>
</html>