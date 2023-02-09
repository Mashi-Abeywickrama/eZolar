<?php
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
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\storekeeper.dashboard.css">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <title>eZolar Dashboard</title>
</head>
<body>
<div class="dashboard-container">
        <div class="dashboard-container-main">
        <div class="main-txt">
                <b>Storekeeper Dashboard</b>
        </div>
        <div class="main-img">
                <img src="\ezolar\public\img\profile.png" alt="profile">
        </div>
        </div>
        <div class="dashboard-container-nav" align="center">
                <a href="/ezolar/Inventory"><div class="dashboard-container-content">
                <div class="dashboard-container-txt">
                        Inventory
                </div>
                <div class="dashboard-container-img">
                        <img src="\ezolar\public\img\storekeeper\Inventory.png" alt="profile">
                </div>
            </div></a>
            
            <a href="/ezolar/Package"> <div class="dashboard-container-content">
                <div class="dashboard-container-txt">
                        Packages
                </div>
                <div class="dashboard-container-img">
                        <img src="\ezolar\public\img\storekeeper\Packages.png" alt="profile">
                </div>
            </div></a>

            <a href="/ezolar/Product"> <div class="dashboard-container-content">
                <div class="dashboard-container-txt">
                        Products
                </div>
                <div class="dashboard-container-img">
                        <img src="\ezolar\public\img\storekeeper\Products.png" alt="profile">
                </div>
            </div></a>

            <div class="dashboard-container-content">
                <div class="dashboard-container-txt">
                        Reports & Stats
                </div>
                <div class="dashboard-container-img">
                        <img src="\ezolar\public\img\storekeeper\Reports.png" alt="profile">
                </div>
            </div>

            <a href="/ezolar/User/profile"><div class="dashboard-container-content">
                <div class="dashboard-container-txt">
                        Profile
                </div>
                <div class="dashboard-container-img">
                        <img src="\ezolar\public\img\storekeeper\Profile.png" alt="profile">
                </div>
            </div></a>
            
            <div class="dashboard-container-content">
                <div class="dashboard-container-txt">
                        Settings
                </div>
                <div class="dashboard-container-img">
                        <img src="\ezolar\public\img\storekeeper\Setting.png" alt="profile">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
