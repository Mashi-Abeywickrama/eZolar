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
    <link rel="stylesheet" href="\ezolar\public\css\common\profile.css">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <title>My Projects</title>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-heading">
        <b>Admin Dashboard</b>
    </div>
    <div class="sidebar-link-container-group">
        <div class="sidebar-link-container-top">
            <a href="/ezolar/Employee">
                <div class="sidebar-link-container-selected">
                    Employees
                </div>
            </a>
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
                <a href="/ezolar/Employee/">
                    <img src="\ezolar\public\img\admin\back.png">
                </a>
            </div>
            <div class="dashboard-common-heading-text">
                <b>View Employee Profile</b>
            </div>
            <div class="dashboard-common-heading-image">
<!--                <a href=”” “text-decoration: none”>-->
                    <img src="\ezolar\public\img\admin\edit.png" alt="edit-icon">
<!--                </a>-->
            </div>

        </div>





    <?php
    $results = $_SESSION['rows'];
    foreach($results as $row){
        echo '
    <div class="profile-container">
        <div class="profile-container-image">
            <div class="profile-container-content">

                    <img class="profile-img" src="\ezolar\public\img\admin\default-profile.png" alt="profile">
<br>
                <div class="profile-container-txt">
                    <div class="profile-container-txt-name">
                        ' . $row -> name . '
                    </div>    <br>
                    <div class="profile-container-txt-type">
                        ' . $row -> type . '
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
                            <input class="form-item-input" name="name" id="name" type="text" value="' . $row -> email . '" readonly>
                        </div>

                        <div class="form-item-container">
                            <div class="form-item-text">
                                Contact Number :
                            </div>
                            <input class="form-item-input" name="nic" id="nic" type="text" value="' . $row -> telno . '" readonly>
                        </div>

                        <div class="form-item-container">
                            <div class="form-item-text">
                                NIC :
                            </div>
                            <input class="form-item-input" name="nic" id="nic" type="text" value="' . $row -> nic . '" readonly>
                        </div>

                        <div class="form-item-container">
                            <div class="form-item-text">
                                Bio :
                            </div>
                            <textarea class="form-item-input" name="bio" id="bio" rows="5" cols="50" readonly>' . $row -> bio . '</textarea>
                        </div>

                    </div>

                </form>
                
                    <div class="form-inline-button">
                         
                        <a href="/ezolar/Employee/editEmployeeView/'.$row -> empID.'">
                            <button class="edit-profile-btn">Edit Profile</button>
                        </a>
                    
                        <a href="/ezolar/Employee/deleteEmployee/'.$row -> empID.'">
                            <button class="delete-profile-btn">Detele Profile</button>
                        </a>
                    </div>
                
                
               
            </div>
        </div>
    </div>
';
    }
    ?>

    </div>
</div>
</body>
</html>

<!--<a href="ezolar/Employee/editEmployeeView/'.$row -> empID.'">-->
<!--    <button class="edit-profile-btn">Edit Profile</button>-->
<!--</a>-->


