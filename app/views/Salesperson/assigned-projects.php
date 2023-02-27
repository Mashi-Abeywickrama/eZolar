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
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\salesperson.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\assigned-projects.css">
    <title>My Projects</title>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-heading">
        <b>Salesperson Dashboard</b>
    </div>
    <div class="sidebar-link-container-group">
        <div class="sidebar-link-container-top">
            <a href="">
                <div class="sidebar-link-container-selected">
                    Assigned Projects
                </div>
            </a>

            <div class="sidebar-link-container">
                Inquiries
            </div>

            <div class="sidebar-link-container">
                Inspection Schedule
            </div>

            <div class="sidebar-link-container">
                Delivery Schedule
            </div>

            <a href="/ezolar/Employee/EngineersAndContractors">
                <div class="sidebar-link-container">
                    Engineers & Contractors
                </div>
            </a>
        </div>

        <div class="sidebar-link-container-bottom">
            <a href=""><div class="sidebar-link-container">
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
            <a href=”#” “text-decoration: none”>
                <img src="\ezolar\public\img\salesperson\assignedProjects.png" alt="project">
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

        <div class="assigned-project-list-container">
            <div class="project-list-topic">
                My Projects
            </div>

            <?php
            $results = $_SESSION['rows'];
            foreach($results as $row){
                if ($row -> Salesperson_Employee_empID != NULL)
                echo '<div class="project-box">
                            <div class="project-text-container">
                                <div class="project-text-container-inner">
                                    <div class="project-text-no">Project No: ' .  $row -> projectID . '</div>
                                    <div class="project-text-name"><b>Status : ' . $row -> status . '</b></div>
                                    <div class="project-text-no">Site Location: ' .  $row -> siteAddress . '</div>
                                </div>
                            </div>
                            <div class="project-details-btn-container">
                                <a href="/ezolar/Project/getProjectDetails/'.$row -> projectID.'">
                                    <div class="project-details-btn">
                                        <div class="project-details-btn-text">More Info</div>
                                    </div>
                                </a>
                            </div>
                        </div>';
            }
            ?>
        </div>

        <div class="new-project-list-container">
            <div class="project-list-topic">
                New Projects
            </div>

            <?php
            $results = $_SESSION['rows'];
            foreach($results as $row){
                if ($row -> Salesperson_Employee_empID == NULL)
                echo '<div class="project-box-new">
                            <div class="project-text-container">
                                <div class="project-text-container-inner">
                                    <div class="project-text-no">Project No: ' .  $row -> projectID . '</div>
                                    <div class="project-text-name"><b>Status : ' . $row -> status . '</b></div>
                                    <div class="project-text-no">Site Location: ' .  $row -> siteAddress . '</div>
                                </div>
                            </div>
                            <div class="project-details-btn-container">
                                <a href="/ezolar/Project/salespersonAssignedProject/'.$row -> projectID.'">
                                    <div class="project-details-btn-new">
                                        <div class="project-details-btn-text">Take Project</div>
                                    </div>
                                </a>
                            </div>
                        </div>';
            }
            ?>
        </div>
    </div>
</div>
</body>
<?php
//$this->view('Includes/footer', $data);
?>
</html>

