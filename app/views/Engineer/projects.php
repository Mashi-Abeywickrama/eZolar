<?php
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
    <link rel="stylesheet" href="\ezolar\public\css\engineer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\engineer.projects.css">
    <title>My Projects</title>
</head>
<body>
<div class="body-container">
    <div class="left-panel">
        <div class="sidebar-heading">
        <a class="sidebar-anchor" href="/ezolar/user/dashboard"><b>Engineer Dashboard</b></a>
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
                <a class="sidebar-anchor" href="/ezolar/EngineerReport"><div class="sidebar-link-container">
                    My Performace Report
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
        <div class="category-container">
            <div class="category-btn" id="priority-btn">Priority Projects</div>
            <div class="category-btn" id="ongoing-btn">Ongoing Projects</div>
            <div class="category-btn" id="finished-btn">Finished Projects</div>
        </div>
        <div class="project-list-container" id="priority-projects">
            <?php
            $results = $_SESSION['rows']['priority'];
            if (count($results)<=0){
                echo '<div class="no-projects-text">No Projects here</div>';
            } else {
                foreach($results as $row){
                    echo '<div class="project-card">
                    <div class="project-text-container">
                        <div class="project-text-container-inner">
                        <div class="project-text-no">Project ID : ' .strtoupper($row -> projectID).'</div>
                        <div class="project-text-status"><b>Status : '.$row -> status.'</b></div>
                        <div class="project-text-location">Site Location : ' .$row -> siteAddress.'</div>
                        </div>
                    </div>
                    <div class="project-details-btn-container">
                        <a href="/ezolar/EngineerProject/projectDetailsPage/'.$row -> projectID.'">
                        <div class="project-details-btn">
                            <div class="project-details-btn-text">More info</div>
                        </div></a>
                    </div>
                </div>';
                }
            }
            ?>
        </div>
        <div class="project-list-container" id="ongoing-projects">
            <?php
            $results = $_SESSION['rows']['ongoing'];
            if (count($results)<=0){
                echo '<div class="no-projects-text">No Projects here</div>';
            } else {
                foreach($results as $row){
                    echo '<div class="project-card">
                    <div class="project-text-container">
                        <div class="project-text-container-inner">
                        <div class="project-text-no">Project ID : ' .strtoupper($row -> projectID).'</div>
                        <div class="project-text-status"><b>Status : '.$row -> status.'</b></div>
                        <div class="project-text-location">Site Location : ' .$row -> siteAddress.'</div>
                        </div>
                    </div>
                    <div class="project-details-btn-container">
                        <a href="/ezolar/EngineerProject/projectDetailsPage/'.$row -> projectID.'">
                        <div class="project-details-btn">
                            <div class="project-details-btn-text">More info</div>
                        </div></a>
                    </div>
                </div>';
                }
            }
            ?>
        </div>
        <div class="project-list-container" id="finished-projects">
            <?php
            $results = $_SESSION['rows']['finished'];
            if (count($results)<=0){
                echo '<div class="no-projects-text">No Projects here</div>';
            } else {
                foreach($results as $row){
                    echo '<div class="project-card">
                    <div class="project-text-container">
                        <div class="project-text-container-inner">
                        <div class="project-text-no">Project ID : ' .strtoupper($row -> projectID).'</div>
                        <div class="project-text-status"><b>Status : '.$row -> status.'</b></div>
                        <div class="project-text-location">Site Location : ' .$row -> siteAddress.'</div>
                        </div>
                    </div>
                    <div class="project-details-btn-container">
                        <a href="/ezolar/EngineerProject/projectDetailsPage/'.$row -> projectID.'">
                        <div class="project-details-btn">
                            <div class="project-details-btn-text">More info</div>
                        </div></a>
                    </div>
                </div>';
                }
            }
            ?>
        </div>
    </div>
    </div>
<div class="f">
    <?php 
      $this->view('Includes/footer', $data);
    ?>
</div>
<script>
    var priority_btn = document.getElementById("priority-btn");
    var ongoing_btn = document.getElementById("ongoing-btn");
    var finished_btn = document.getElementById("finished-btn");

    var priority_projects = document.getElementById("priority-projects");
    var ongoing_projects = document.getElementById("ongoing-projects");
    var finished_projects = document.getElementById("finished-projects");
    var all_projects = document.getElementsByClassName("project-list-container");
    Array.from(all_projects).forEach(hideList);
    priority_btn.classList.add('select');
    priority_projects.classList.remove('hide');
    priority_projects.classList.add('select');

    function hideList(list){
        list.classList.remove('select');
        list.classList.add('hide');
    }

    function selectList(list){
        Array.from(all_projects).forEach(hideList);
        list.classList.remove('hide');
        list.classList.add('select');
    }


    priority_btn.addEventListener('click', function(btn) {
        btn.target.classList.add('select');
        ongoing_btn.classList.remove('select');
        finished_btn.classList.remove('select');
        selectList(priority_projects);
    });
    ongoing_btn.addEventListener('click', function(btn) {
        btn.target.classList.add('select');
        priority_btn.classList.remove('select');
        finished_btn.classList.remove('select');
        selectList(ongoing_projects);
    });
    finished_btn.addEventListener('click', function(btn) {
        btn.target.classList.add('select');
        priority_btn.classList.remove('select');
        ongoing_btn.classList.remove('select');
        selectList(finished_projects);
    })
</script>
</body>
</html>