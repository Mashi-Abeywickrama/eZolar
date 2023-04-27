<?php
//  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
// require_once(__ROOT__.'\app\views\Includes\header.php');
require_once(__ROOT__.'\app\views\Customer\navbar.php');
// require_once(__ROOT__.'\app\views\Includes\footer.php');
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

<div class="body-container">
    <div class="left-panel">
        <a href="<?=URLROOT?>/user/dashboard"><div class ="box1">
            Salesperson Dashboard
        </div></a>
        <div class="rest">
            <div class="rest-top">
            <a href="<?=URLROOT?>/Project/SalespersonViewProjects"><div class="box7">
                    Assigned Projects
                </div></a>
            <a href="<?=URLROOT?>/Inquiry/getSalespersonInquiries"><div class="box2">
                    Inquiries
            </div></a>
            <a href="<?=URLROOT?>/SalespersonSchedules/InspectionSchedule"><div class="box3">
                Inspection Schedule
            </div></a>
            <a href="<?=URLROOT?>/SalespersonSchedules/DeliverySchedule"><div class="box4">
                Delivery Schedule
            </div></a>
            
            <a href="<?=URLROOT?>/Employee/EngineersAndContractors"><div class="box8">
            Engineers & Contractors
            </div></a>

        </div>
        <div class="rest-bottom">
            <a href="<?=URLROOT?>/user/profile"><div class="box5">
                Profile
            </div></a>
            <a href="<?=URLROOT?>/"><div class="box6">
                Settings
            </div></a>
            </div>
        </div>
    </div>

<div class="common-main-container">
    <div class="dashboard-common-main-topic">
        <div class = "common-main-topic-left">
            <div class="common-main-left-img">
                <a href=”#” “text-decoration: none”>
                    <img src="\ezolar\public\img\salesperson\assignedProjects.png" alt="project">
                </a>
            </div>
            <div class="common-main-txt">
                Assigned Projects
            </div>
        </div>

    </div>
    <div class="project-list-container">

        <div class="assigned-project-list-container">
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
    </div>
</div>
        </div>
<div class = "f">
<?php
$this->view('Includes/footer', $data);
?>
</div>
</body>

</html>

