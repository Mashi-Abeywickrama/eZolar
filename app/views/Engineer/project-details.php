<?php
    //  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
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
                Assigned Project : <?php echo strtoupper($_SESSION['row']->projectID);?>
            </div>
            
            <div class="common-main-right-img">
                <img src="\ezolar\public\img\profile.png" alt="profile">
            </div>
            </div>
            <div class="project-details-container">
                <div class="project-details-inline-container">
                    <div class="project-details-basic-container">
                        <p class="project-details-basic-status-text"><b>Project Status : <?php echo strtoupper($_SESSION['row']->status); ?></b></p>
                        <p><b>Site address : </b> <?php echo $_SESSION['row']->siteAddress ?></p>
                        <p><b>Assigned Salesperson ID : </b> <?php echo $_SESSION['row']->Salesperson_Employee_empID ?> </p>
                    </div>
                    <div class="project-details-customer-container">
                        <p><b>Customer Name </b> <br> <span style="font-size:30px;"><?php echo $_SESSION['row']->name;?></span></p>
                        <p><b>Contact Number </b> <br> <?php echo str_pad($_SESSION['row']->mobile,10,"0",STR_PAD_LEFT);?></p>
                    </div>
                </div>

                <div class="project-details-schedule-container">
                    <p><b>Inspection Date : </b><?php echo $_SESSION['rows']['InspectDates'];?></p>
                    <p><b>Delivery Date : </b><?php echo $_SESSION['rows']['DeliverDates'];?></p>
                </div>

                <div class="project-details-pack-container">
                    <p class="project-details-pack-text"><b>Package : </b> <?php echo strtoupper($_SESSION['row']->Package_packageID)?></p>
                    <?php
                    $packAssignedFlag = True;
                    if ($_SESSION['row']->Package_packageID == 'Not Assigned'){
                        echo '<a href="/ezolar/EngineerProject/assignPackagePage/'.$_SESSION['row']->projectID.'"><div class="product-details-pack-btn">Assign Package</div></a>';
                        $packAssignedFlag = False;
                    } else {
                        echo '<a href="/ezolar/EngineerProject/projectPackageDetailsPage/'.$_SESSION['row']->projectID.'"><div class="product-details-pack-btn">More Info</div></a>';
                    }
                    ?>
                </div>

                <div class="project-details-btns-container">
                    <?php 
                    if ($packAssignedFlag)
                    {
                        echo '<a href="/ezolar/EngineerProject/assignPackagePage/'.$_SESSION['row']->projectID.'"><div class="project-details-btns">Change Package</div></a>
                        <a href="/ezolar/EngineerProject/projectModifyPackPage/'.$_SESSION['row']->projectID.'"><div class="project-details-btns">Modify Package</div></a>
                    ';} ?>
                    
                    <a href=""><div class="project-details-btns">Request Reshedule</div></a>
                </div>
        </div>
        
    </div>
</body>
</html>