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
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\customer.password.css">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    
</head>
<body>
    <?php
        require_once(__ROOT__.'\Includes\popup.php');
        if (isset($_POST['sub'])) {
            print_r("Shit");
            echo '
            <script>
                document.getElementById('."'id01'".').style.display='."'block'".';
            </script>
            
            ';
        }
    ?>
<div class="body-container">
<?php
        require_once(__ROOT__.'\app\views\Customer\navigationpanel.php');
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
            <div class="common-main-right-img">
                <img src="\ezolar\public\img\profile.png" alt="profile">
            </div>
        </div>

        <div class="dashboard-common-heading-container">
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
            <!-- <form name="Reset Form" action="#" method="POST"> -->
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
<script src="<?=URLROOT?>/public/js/validation.js"></script>
</body>
</html>