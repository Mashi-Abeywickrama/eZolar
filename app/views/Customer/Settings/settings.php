<?php
     define('__ROOT__', dirname(dirname(dirname(__FILE__))));
     require_once(__ROOT__.'\Includes\header.php');
     require_once(__ROOT__.'\Includes\navbar.php');
     require_once(__ROOT__.'\Includes\footer.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.css">
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.common.css">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <title>eZolar Dashboard</title>
</head>
<body>
    <div class="left-panel">
        <a href="<?=URLROOT?>/user/dashboard"><div class ="box1">
            Customer Dashboard
        </div></a>
        <div class="rest">
            <div class="rest-top">
            <a href="<?=URLROOT?>/project"><div class="box2">
                    My Projects
                </div></a>
                <a href="<?=URLROOT?>/inquiry"><div class="box3">
                    Inquiries
                </div></a>
                <div class="box4">
                    Transactions
                </div>
            </div>
            <div class="rest-bottom">
            <a href="<?=URLROOT?>/user/profile"><div class="box5">
                    Profile
                </div></a>
                <a href="<?=URLROOT?>/customersettings"><div class="box6">
                    Settings
                </div></a>
            </div>
        </div>
    </div>

    <div class="common-main-container">
        <div class="dashboard-common-main-topic">
            <div class="common-main-left-img">
                <a href=”” “text-decoration: none”>
                    <img src="\ezolar\public\img\setting\Setting.png" alt="settings">
                </a>
            </div>
            <div class="common-main-txt">
                Settings
            </div>
            
            <div class="common-main-right-img">
                <img src="\ezolar\public\img\profile.png" alt="profile">
            </div>   
        </div>
<!-- have to embed links  -->
        <div class="settings-body-container" >
            <a href="<?=URLROOT?>/user/editprofile"><div class="dashboard-settings-container-content">
                <div class="dashboard-container-txt">
                   Edit Profile Info
                </div>
                <div class="dashboard-container-img">
                    <img src="\ezolar\public\img\setting\Edit.png" alt="Edit">
                </div>
            </div></a>
            <div class="dashboard-settings-container-content">
                <div class="dashboard-container-txt">
                    <a href="#"> Change Password</a>
                </div>
                <div class="dashboard-container-img">
                    <img src="\ezolar\public\img\setting\Lock.png" alt="Change Password">
                </div>
            </div>
            <div class="dashboard-settings-container-content">
               <div class="dashboard-container-txt">
                    Appearence
               </div>
               <div class="dashboard-container-img">
                    <img src="\ezolar\public\img\setting\Appearence.png" alt="Appearence">
               </div>
            </div>
            <div class="dashboard-settings-container-content">
                    <div class="dashboard-container-txt">
                        Delete Account
                    </div>
                    <div class="dashboard-container-img">
                        <img src="\ezolar\public\img\setting\Delete.png" alt="Delete">
                    </div>
            </div>
            <div class="dashboard-settings-container-content">
                    <div class="dashboard-container-txt">
                        Help
                    </div>
                    <div class="dashboard-container-img">
                        <img src="\ezolar\public\img\setting\Help.png" alt="Help Outline">
                    </div>
            </div>
        </div>
    </div>
</body>
</html>