<?php
// require_once(__ROOT__.'\app\views\Includes\header.php');
require_once(__ROOT__.'\app\views\Customer\navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\customer.Profile.css">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <title>My Profile</title>
</head>
<body>
<div class="body-container">
    <div class="left-panel">
        <a href="<?=URLROOT?>/user/dashboard"><div class ="box1">
            Customer Dashboard
        </div></a>
        <div class="rest">
            <div class="rest-top">
            <a href="<?=URLROOT?>#"><div class="box7">
                    Packages
                </div></a>
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
            <div class="common-main-topic-left">
                <div class="common-main-left-img">
                    <a href=”” “text-decoration: none”>
                        <img src="\ezolar\public\img\customer\Person.png" alt="profile">
                    </a>
                </div>
                <div class="common-main-txt">
                    My Profile
                </div>
            </div>
        </div>
    




        <?php
        $mail = $_SESSION['user_email'];
        $results = $_SESSION['rows'];
        foreach($results as $row){
            echo '
    <div class="profile-container">
        <div class="profile-container-image">
            <div class="profile-container-content">

                <div class = "profile-img-div">
                    <img class="profile-img" src="/ezolar/public/img/user-pics/'.$row->profile.'" alt="profile">
                </div>
                <div class="profile-container-txt">
                    <div class="profile-container-txt-name">
                        ' . $row -> name . '
                    </div>
                    <div class="profile-container-txt-type">
                        ' . $row -> address . '
                    </div>
                </div>
            </div>
        </div>

        <div class="profile-container-details">
            <div class="form-background">

                <form class="form-container" method="GET">
                    <div class="form-inline">

                        <div class="form-item-container">
                            <div class="form-item-text">
                                Email :
                            </div>
                            <input class="form-item-input" name="name" id="name" type="text" placeholder="' . $mail . '" readonly>
                        </div><br>

                        <div class="form-item-container">
                            <div class="form-item-text">
                                Address :
                            </div>
                            <input class="form-item-input" name="address" id="address" type="text" placeholder="' . $row -> address . '" readonly>
                        </div><br>

                        <div class="form-item-container">
                            <div class="form-item-text">
                                Contact Number :
                            </div>
                            <input class="form-item-input" name="nic" id="nic" type="text" placeholder="0' . $row -> mobile . '" readonly>
                        </div>
                        <div class="form-item-container">
                            <div class="form-item-text">
                                NIC :
                            </div>
                            <input class="form-item-input" name="nic" id="nic" type="text" placeholder="' . $row -> nic . '" readonly>
                        </div>

                    </div>

                </form>
                
                    <a href="'.URLROOT.'/user/editprofile">
                        <div class="edit-profile-btn">
                            <div class="edit-profile-btn-text">
                                Edit Profile
                            </div>
                        </div>
                    </a>
            </div>
        </div>
    </div>
';
        }
        ?>


</div>
    </div>
<div  class="f">
    <?php
require_once(__ROOT__.'\app\views\Includes\footer.php');
?>
</div>
</body>
</html>
