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
    <link rel="stylesheet" href="\ezolar\public\css\customer.Profile.css">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <title>My Profile</title>
</head>
<body>
<div class="body-container">
    <div class="left-panel">
        <a href="<?=URLROOT?>/user/dashboard"><div class ="box1">
            Contractor Dashboard
        </div></a>
        <div class="rest">
            <div class="rest-top">
            <a href="<?=URLROOT?>/contractor/assignedProjects"><div class="box2">
                    Assigned Projects
                </div></a>
                <a href="<?=URLROOT?>/"><div class="box3">
                    My Schedule
                </div></a>
                <a href="<?=URLROOT?>/contractor/reportIssue"><div class="box4">
                    Report an Issue
                </div></a>
            </div>
            <div class="rest-bottom">
                <a href="<?=URLROOT?>/user/profile"><div class="box5">
                    Profile
                </div></a>
                <a href="<?=URLROOT?>/setting"> <div class="box6">
                    Settings
                </div></a>
            </div>
        </div>
    </div>

<div class="common-main-container">
    <div class="dashboard-common-heading-and-background-container">
        <div class="dashboard-common-heading-container">
            <div class="dashboard-common-heading-back-btn">
                <a href="<?=URLROOT?>/user/profile" “text-decoration: none”>
                    <img src="\ezolar\public\img\admin\back.png">
                </a>
            </div>
            <div class="dashboard-common-heading-text">
                <b>Edit My Profile</b>
            </div>
            <div class="dashboard-common-heading-image">
                <a “text-decoration: none”>
                    <img src="\ezolar\public\img\setting\Edit.png" alt="edit-icon">
                </a>
            </div>

        </div>
    </div>

<?php
$results = $_SESSION['rows'];
foreach($results as $row){
    echo '
    
    <div class="form-background">

        <form class="form-container" action="/ezolar/user/editProfile" method="POST">
            <div class="form-inline">
                <div class="form-item-container">
                    <div class="form-item-text">
                        Name :
                    </div>
                    <input class="form-item-input" name="name" id="name" type="text" value="' . $row ->name . '">
                </div>
                <div class="form-item-container">
                    <div class="form-item-text">
                        Email :
                    </div>
                    <input class="form-item-input" name="email" id="email" type="text" value="' . $_SESSION['user_email'] . '">
                </div>
                <div class="form-item-container">
                    <div class="form-item-text">
                        My Role :
                    </div>
                    <input class="form-item-input" name="address" id="address" type="text" value="' . $row ->type . '" readonly>
                </div>
                <div class="form-item-container">
                    <div class="form-item-text">
                        Contact Number :
                    </div>
                    <input class="form-item-input" name="mobile" id="mobile" type="text" value="' . $row ->telno . '">
                </div>
                <div class="form-item-container">
                    <div class="form-item-text">
                        NIC Number :
                    </div>
                    <input class="form-item-input" name="nic" id="bio" type="nic" value="' . $row ->nic . '" readonly>
                </div>
            </div>

            <div class="form-inline-button">
                <div class="cancel-btn">
                    <button class="form-cancel-btn" type="reset" value="reset" onclick="clearErrorMessage()">Cancel</button>
                </div>
                <div class="submit-btn">
                    <button type="submit" class="form-submit-btn" onclick="return validateEditProfile()">Submit</button>
                </div>
            </div>
        </form>
    </div>
    ';
}
?>



</div>
</div>
<script type="text/javascript" src="\ezolar\public\js\validation.js"></script>
</body>
</html>
