<?php
// define('__ROOT__', dirname(dirname(dirname(__FILE__))));
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
    <link rel="stylesheet" href="\ezolar\public\css\admin\admin.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\admin\editMyProfile.css">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <title>My Projects</title>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-heading">
        <b>Admin Dashboard</b>
    </div>
    <!--    Side Bar-->
    <div class="sidebar-link-container-group">
        <div class="sidebar-link-container-top">
        <a href="/ezolar/Employee"><div class="sidebar-link-container">
                Employees
            </div>
            <div class="sidebar-link-container">
                Packages
            </div>
            <div class="sidebar-link-container">
                Products
            </div>
            <div class="sidebar-link-container">
                Reports
            </div>
        </div>

        <div class="sidebar-link-container-bottom">
            <a href="/ezolar/AdminViewProfile"><div class="sidebar-link-container-selected">
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
                <a href="/ezolar/AdminViewProfile" “text-decoration: none”>
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

        <form class="form-container" action="/ezolar/AdminEditProfile/editProfile" method="POST">
            <div class="form-inline">
                <div class="form-item-container-half">
                    <div class="form-item-text">
                        Name :
                        <span class="err-box" id="fname-err"></span>
                    </div>
                    <input class="form-item-input" name="name" id="name" type="text" onkeyup="validatefName()" value="' . $row -> name . '"  required>
                </div>
                <div class="form-item-container-half">
                    <div class="form-item-text">
                        Tel No :
                        <span name="contactErr" id="contact-err"></span>
                    </div>
                    <input class="form-item-input" name="telno" id="telno" type="text" value="' . $row -> telno . '" onkeyup="validateTelNo()" required>
                </div>
            </div>
            <div class="form-inline">
                <div class="form-item-container">
                    <div class="form-item-text">
                        Bio :
                    </div>
                    <input class="form-item-input" name="bio" id="bio" type="text" value="' . $row ->bio . '">
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
<script type="text/javascript" src="\ezolar\public\js\validation.js"></script>

</body>
</html>
