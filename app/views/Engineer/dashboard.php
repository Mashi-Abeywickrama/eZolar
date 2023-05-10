<?php
     require_once(__ROOT__.'\app\views\Customer\navbar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\engineer.dashboard.css">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <title>eZolar Dashboard</title>
</head>
<body>
<div class="body-container">
<div class="dashboard-container">
        <div class="dashboard-container-main">
           <div class="main-txt">
                Engineer Dashboard
           </div>
        </div>
        <div class="dashboard-container-content">
           <a href="/ezolar/EngineerProject" class="dashboard-anchor"><div class="dashboard-container-txt">
               Assigned Projects
           </div>
           <div class="dashboard-container-img">
                <img src="\ezolar\public\img\engineer\Projects.png" alt="projects">
           </div></a>
        </div>
        <div class="dashboard-container-content">
        <a href="/ezolar/EngineerSchedule" class="dashboard-anchor"><div class="dashboard-container-txt">
           My Schedule
           </div>
           <div class="dashboard-container-img">
                <img src="\ezolar\public\img\engineer\Calendar.png" alt="schedule">
           </div></a>
        </div>
        <div class="dashboard-container-content">
        <a href="/ezolar/EngineerIssue" class="dashboard-anchor"><div class="dashboard-container-txt">
                Report an Issue
           </div>
           <div class="dashboard-container-img">
                <img src="\ezolar\public\img\engineer\ReportIssue.png" alt="issues">
           </div></a>
        </div>
        <div class="dashboard-container-content">
        <a href="/ezolar/User/profile" class="dashboard-anchor"><div class="dashboard-container-txt">
                Profile
           </div>
           <div class="dashboard-container-img">
                <img src="\ezolar\public\img\engineer\Person.png" alt="profile">
           </div></a>
        </div>
        <div class="dashboard-container-content">
        <a href="" class="dashboard-anchor"><div class="dashboard-container-txt">
                Settings
           </div>
           <div class="dashboard-container-img">
                <img src="\ezolar\public\img\engineer\Setting.png" alt="Settings">
           </div></a>
        </div>
    </div>
    </div>
    <div class="f">
    <?php 
      $this->view('Includes/footer', $data);
    ?>
</div>
</body>
</html>
