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
    <link rel="stylesheet" href="\ezolar\public\css\storekeeper.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\packages.css">
    <link rel="stylesheet" href="\ezolar\public\css\admin\admin.dashboard.common.css">
    <title>My Projects</title>
</head>
<body>

<div class="sidebar">
        <div class="sidebar-heading">
            <b>Admin Dashboard</b>
        </div>
        <div class="sidebar-link-container-group">
            <div class="sidebar-link-container-top">
                <a href="/ezolar/Employee"><div class="sidebar-link-container">
                    Employees
                </div></a>
                <a href=/ezolar/Package>
                    <div class="sidebar-link-container-selected">
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
        <div class="dashboard-common-main-topic">
            <div class="common-main-left-img">
                <a href=”” “text-decoration: none”>
                    <img src="\ezolar\public\img\storekeeper\Packages.png" alt="Packages-icon">
                </a>
            </div>
            <div class="common-main-txt">
                Packages
            </div>
            
            <div class="common-main-right-img">
                <img src="\ezolar\public\img\profile.png" alt="profile">
            </div>   
        </div>
        <div class="package-list-container">
            <!--<div class="package-card">
                <div class="package-image-container">

                </div>
                <div class="package-text-container">
                    <div class="package-text-container-inner">
                    <div class="package-text-no">package No. 123456</div>
                    <div class="package-text-name"><b>Pylon Tech Lithium Iron Battery 2.4 kWh</b></div>
                    <div class="package-text-price">Price: Rs. 30,000</div>
                    </div>
                </div>
                <div class="package-details-btn-container">
                    <div class="package-details-btn">
                        <div class="package-details-btn-text">More info</div>
                    </div>
                </div>
            </div>-->
            <?php
            $results = $_SESSION['rows'];
            foreach($results as $row){
                echo '<div class="package-card">
                <div class="package-image-container">

                </div>
                <div class="package-text-container">
                    <div class="package-text-container-inner">
                    <div class="package-text-no">Package No.' .$row -> packageID.'</div>
                    <div class="package-text-name"><b>'.$row -> name.'</b></div>
                    <div class="package-text-price">Price: Rs.' .$row -> budgetRange.'</div>
                    </div>
                </div>
                <div class="package-details-btn-container">
                    <a href="/ezolar/Package/packageDetailspage/'.$row -> packageID.'"><div class="package-details-btn">
                        <div class="package-details-btn-text">More info</div>
                    </div></a>
                </div>
            </div>';
            }
            ?>
        </div>
        <a href="/ezolar/Package/newPackagePage">
        <div class="add-package-btn">
            <div class="add-package-btn-text">
                Add Package
            </div>
        </div></a>
    </div>
</body>
</html>