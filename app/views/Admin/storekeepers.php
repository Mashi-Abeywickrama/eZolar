<?php
//     define('__ROOT__', dirname(dirname(dirname(__FILE__))));
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
    <link rel="stylesheet" href="\ezolar\public\css\admin\admin.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\admin\employee-list.css">
    <title>My Projects</title>
</head>
<body>

<div class="sidebar">
        <div class="sidebar-heading">
            <b>Admin Dashboard</b>
        </div>
        <div class="sidebar-link-container-group">
            <div class="sidebar-link-container-top">
                <a href="/ezolar/Employee"><div class="sidebar-link-container-selected">
                    Employees
                </div></a>
                <a href=/ezolar/Package>
                    <div class="sidebar-link-container">
                        Packages
                    </div>
                </a>
                <a href=/ezolar/Product>
                    <div class="sidebar-link-container">
                        Products
                    </div>
                </a>
                <div class="sidebar-link-container">
                    Reports 
                </div>
            </div>

            <div class="sidebar-link-container-bottom">
                <a href="/ezolar/AdminViewProfile"><div class="sidebar-link-container">
                    Profile
                </div>
                <div class="sidebar-link-container">
                    Settings
                </div>
            </div>
        </div>
    </div>
    <div class="common-main-container">
        <div class="dashboard-common-heading-and-background-container">
            <div class="dashboard-common-heading-container">
                <div class="dashboard-common-heading-back-btn">
                    <a href=”” “text-decoration: none”>
                        <img src="\ezolar\public\img\admin\back.png">
                    </a>
                </div>
                <div class="dashboard-common-heading-text">
                    <b>Storekeepers</b>
                </div>
                <div class="dashboard-common-heading-image">
                    <a href=”” “text-decoration: none”>
                        <img src="\ezolar\public\img\admin\employees.png" alt="Products-icon">
                    </a>
                </div>
 
            </div>  

            <!-- TODO -> add peofile -->
            <!-- <div class="common-main-right-img">
                <img src="\ezolar\public\img\profile.png" alt="profile">
            </div>   -->


            <div class="employee-list-container">

            <?php
            $results = $_SESSION['rows'];
            foreach($results as $row){
                echo '<div class="employee-card">
                <div class="employee-image-container">
                    <img src="\ezolar\public\img\admin\defaultProfile.png"> 
                </div>
                <div class="employee-text-container">
                    <div class="employee-text-container-inner">
                    <div class="employee-text-no">' . $row -> empID . '</div>
                    <div class="employee-text-name"><b>' .  $row -> name . '</b></div>
                    <div class="employee-text-price">Telephone No: ' .  $row -> telno . '</div>
                    </div>
                </div>
                <div class="employee-details-btn-container">
                    <div class="employee-details-btn">
                        <div class="employee-details-btn-text">More info</div>
                    </div>
                </div>
            </div>';
            }
            ?>
            <!-- <div class="employee-card">
                <div class="employee-image-container">
                    
                </div>
                <div class="employee-text-container">
                    <div class="employee-text-container-inner">
                    <div class="employee-text-no">Employee ID: E12345</div>
                    <div class="employee-text-name"><b>A.B.C. Bandara</b></div>
                    <div class="employee-text-price">Telephone No: 071 3452625</div>
                    </div>
                </div>
                <div class="employee-details-btn-container">
                    <div class="employee-details-btn">
                        <div class="employee-details-btn-text">More info</div>
                    </div>
                </div>
            </div>

            <div class="employee-card">
                <div class="employee-image-container">
                    
                </div>
                <div class="employee-text-container">
                    <div class="employee-text-container-inner">
                    <div class="employee-text-no">Employee ID: E22356</div>
                    <div class="employee-text-name"><b>W.A. Gunawardhana</b></div>
                    <div class="employee-text-price">Telephone No: 071 3453678</div>
                    </div>
                </div>
                <div class="employee-details-btn-container">
                    <div class="employee-details-btn">
                        <div class="employee-details-btn-text">More info</div>
                    </div>
                </div>
            </div> -->

        </div>
                
        </div>
    </div>
</body>
</html>