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
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\inquiries.css">
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
            <div class="sidebar-link-container-selected">
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
            <a href=”” “text-decoration: none”>
                <img src="\ezolar\public\img\customer\Inquiry.png" alt="Inquiry">
            </a>
        </div>
        <div class="common-main-txt">
            Inquiries
        </div>

        <div class="common-main-right-img">
            <img src="\ezolar\public\img\profile.png" alt="profile">
        </div>
    </div>
    <div class="inquiry-list-container">

        <?php
        $results = $_SESSION['rows'];
        foreach($results as $row){
            echo '<div class="inquiry-box">
                        <div class="inquiry-text-container">
                            <div class="inquiry-text-container-inner">
                                <div class="inquiry-text-no">Type:' .  $row -> name . '</div>
                                <div class="inquiry-text-name"><b>Topic :' . $row -> topic . '</b></div>
                            </div>
                        </div>
                        <div class="inquiry-details-btn-container">
                            <a href="/ezolar/Inquiry/viewInquiry/'.$row -> inquiryID.'">
                                <div class="inquiry-details-btn">
                                    <div class="inquiry-details-btn-text">Respond</div>
                                </div>
                            </a>
                        </div>
                        
                    </div>';
        }
        ?>

    </div>

</div>
</body>
</html>

