<?php
    //  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
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
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <link rel="stylesheet" href="\ezolar\public\css\engineer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\engineer.projects.css">
    <title>My Projects</title>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-heading">
            <b>Engineer Dashboard</b>
        </div>
        <div class="sidebar-link-container-group">
            <div class="sidebar-link-container-top">
                <a class="sidebar-anchor" href="/ezolar/EngineerProject"><div class="sidebar-link-container-selected">
                    Assigned Projects
                </div></a>
                <a class="sidebar-anchor" href="/ezolar/EngineerSchedule"><div class="sidebar-link-container">
                    My Schedule
                </div></a>
                <a class="sidebar-anchor" href="/ezolar/EngineerIssue"><div class="sidebar-link-container">
                    Report an Issue
                </div></a>
            </div>

            <a class="sidebar-anchor" href="/ezolar/User/profile"><div class="sidebar-link-container-bottom">
                <div class="sidebar-link-container">
                    Profile
                </div></a>
            <a class="sidebar-anchor" href=""><div class="sidebar-link-container">
                    Settings
                </div></a>
            </div>
        </div>
    </div>
    <div class="common-main-container">
        <div class="dashboard-common-main-topic">
            <div class="common-main-left-img">
                <a href=”” “text-decoration: none”>
                    <img src="\ezolar\public\img\engineer\Projects.png" alt="projects-icon">
                </a>
            </div>
            <div class="common-main-txt">
                Assigned Projects
            </div>
            
            <div class="common-main-right-img">
                <img src="\ezolar\public\img\profile.png" alt="profile">
            </div>   
        </div>
        <div class="project-list-container">
            <!--<div class="project-card">
                <div class="project-image-container">

                </div>
                <div class="project-text-container">
                    <div class="project-text-container-inner">
                    <div class="project-text-no">project No. 123456</div>
                    <div class="project-text-name"><b>Pylon Tech Lithium Iron Battery 2.4 kWh</b></div>
                    <div class="project-text-price">Price: Rs. 30,000</div>
                    </div>
                </div>
                <div class="project-details-btn-container">
                    <div class="project-details-btn">
                        <div class="project-details-btn-text">More info</div>
                    </div>
                </div>
            </div>-->
            <?php
            $results = $_SESSION['rows'];
            foreach($results as $row){
                echo '<div class="project-card">
                <div class="project-image-container">

                </div>
                <div class="project-text-container">
                    <div class="project-text-container-inner">
                    <div class="project-text-no">Project No.' .$row -> projectID.'</div>
                    <div class="project-text-status"><b>Status : '.$row -> status.'</b></div>
                    <div class="project-text-location">Site Location : ' .$row -> siteAddress.'</div>
                    </div>
                </div>
                <div class="project-details-btn-container">
                    <div class="project-details-btn">
                        <div class="project-details-btn-text">More info</div>
                    </div>
                </div>
            </div>';
            }
            ?>
        </div>
    </div>
</body>
</html>