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
    <link rel="stylesheet" href="\ezolar\public\css\reports.css">
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
                <a class="sidebar-anchor" href="/ezolar/EngineerProject"><div class="sidebar-link-container">
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
                Engineer Reports
            </div>
            </div>
            <div class="report-container">
                <div class="report-inline">
                    <div class="eng-report-inspections-section">
                        <div class="report-title-text"> Inspections Statistics </div>
                        Number of Inspections this week : <?php echo $_SESSION['inspection']['current'];?> <br>  
                        Number of Inspections last week : <?php echo $_SESSION['inspection']['last'];?> <br>
                        Change : <?php echo $_SESSION['inspection']['change'];?> <br><br>
                        Company Average of the Week: <?php echo $_SESSION['inspection']['average'];?>
                    </div>
                    <div class="eng-report-package-section">
                        <div class="report-title-text"> Package Price Statistics </div>
                        Package Prices of your projects: <br>
                        <?php 
                        $subtotal = 0;
                        foreach($_SESSION['package'] as $project){
                            echo 'From '.$project['projectID'].' : '.'Rs.'.number_format($project['total'],0,'.',',').'/= <br>';
                            $subtotal += $project['total'];
                        }

                        echo '<br> Total : '.'Rs.'.number_format($subtotal,0,'.',',').'/= <br>'
                        ?>

                    </div>
                </div>
                <div class="eng-report-project-section"></div>
            </div>
            
        
        
    </div>  
</div>
<div class="f">
    <?php 
      $this->view('Includes/footer', $data);
      unset($_SESSION['inspection'],$_SESSION['package'],$_SESSION['project']);
    ?>
</div>
</body>
</html>