<?php
     define('__ROOT__', dirname(dirname(dirname(__FILE__))));
     require_once(__ROOT__.'/Customer/navbar.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\ezolar\public\css\customer.settings.css">
    <link rel="stylesheet" href="\ezolar\public\css\style.css">
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.common.css">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <title>eZolar Dashboard</title>
</head>
<body>
<div class="body-container">
<?php
        require_once(__ROOT__.'\Customer\navigationpanel.php');
    ?>

    <div class="common-main-container">
        <div class="dashboard-common-main-topic">
            <div class="common-main-topic-left">
                <div class="common-main-left-img">
                    <a href=”” “text-decoration: none”>
                        <img src="\ezolar\public\img\setting\Setting.png" alt="settings">
                    </a>
                </div>
                <div class="common-main-txt">
                    Settings
                </div>
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
            <a href="<?=URLROOT?>/user/updatePasswordpage"><div class="dashboard-settings-container-content">
                <div class="dashboard-container-txt">
                    Change Password
                </div>
                <div class="dashboard-container-img">
                    <img src="\ezolar\public\img\setting\Lock.png" alt="Change Password">
                </div>
            </div></a>
            <!-- <div class="dashboard-settings-container-content">
               <div class="dashboard-container-txt">
                    Appearence
               </div>
               <div class="dashboard-container-img">
                    <img src="\ezolar\public\img\setting\Appearence.png" alt="Appearence">
               </div>
            </div> -->
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
</div>
<div  class="f">
    <?php
        require_once(__ROOT__.'\Includes\footer.php');
    ?>
</div>
</body>
</html>