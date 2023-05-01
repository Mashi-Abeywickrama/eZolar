<?php
    // define('__ROOT__', dirname(dirname(dirname(__FILE__))));
    require_once(__ROOT__.'\app\views\Customer\navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\customer.password.css">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    
</head>
<body>
<div class="body-container">
    <?php
        require_once(__ROOT__.'\app\views\Customer\navigationpanel.php');
    ?>
    <div class="common-main-container">

        <div class="dashboard-common-heading-container">
            <div class="dashboard-common-heading-back-btn">
                <a href="<?=URLROOT?>/customersettings"" “text-decoration: none”>
                <img src="\ezolar\public\img\storekeeper\Back.png">
                </a>
            </div>
            <div class="dashboard-common-heading-text">
                <b>Reset Password</b>
            </div>
            <div class="dashboard-common-heading-image">
                <a “text-decoration: none”>
                    <img src="\ezolar\public\img\setting\Lock.png" alt="pwd-icon">
                </a>
            </div>

        </div>
        <div class="form-container-reset">
            <form class="update-p-form" name="Reset Form" action="/ezolar/user/updatePassword" method="POST">
            <div class="err">Current Password
                    <div class = "err-group">
                        <span class="star">*</span>
                        <span class="err-box" id="cur-pwd-err"></span>
                    </div>
                </div>
                <input class="r-in" name="currentpassword" id="curpwd" type="password" placeholder="********" required onkeyup="validatePassword()">

                <div class="err">New Password
                    <div class = "err group">
                        <span class="star">*</span>
                        <span class="err-box" id="pwd-err"></span>
                    </div>
                </div>
                <input class="r-in" name="password" id="pwd" type="password" placeholder="********" required onkeyup="validatePassword1()">
                <div class="err">Confirm Password
                    <div class = "err-group">
                        <span class="star">*</span>
                        <span class="err-box" id="cpwd-err"></span>
                    </div>
                </div>
                <input class="r-in" name="cpassword" id="cpwd" type="password" placeholder="********" required onkeyup="validatePassword()">

                <div class = "group" >
                    <button class="cancel-btn" type="cancel" >Cancel</button>
                    <button class="submit-btn" type="submit" onclick="document.getElementById('id01').style.display='block'" >Submit</button>
                </div>
            <!-- </form> -->
        </div>
    </div>
</div>
<div class = "f">
    <?php
        require_once(__ROOT__.'\app\views\Includes\footer.php');
    ?>
</div>
<script src="<?=URLROOT?>/public/js/validation.js"></script>
</body>
</html>