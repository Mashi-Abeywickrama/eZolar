<?php
//     define('__ROOT__', dirname(dirname(dirname(__FILE__))));
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
    <link rel="stylesheet" href="\ezolar\public\css\admin\admin.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\admin\add-employee-successful.css">
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
        <div class="dashboard-common-main-topic">
            <div class="common-main-left-img">
                <a href=”” “text-decoration: none”>
                    <img src="\ezolar\public\img\admin\employees.png" alt="employee-icon">
                </a>
            </div>
            <div class="common-main-txt">
                Add Employee
            </div>
            
            <div class="common-main-right-img">
                <img src="\ezolar\public\img\profile.png" alt="profile">
            </div>   
        </div>


        <div class="successful-container">
            <div class="successful-container-main">
                <div class="successful-image">
                    <img src="\ezolar\public\img\admin\correct.png" alt="correct-icon">
                </div>
                <div class="successful-text">
                    Account Created Successfully
                </div>
            </div>    
            <!-- <div class="successful-account">
                <div class="account-txt">
                    An employee account was created for the email
                </div>
                <div class="account-email">
                    example@gmail.com
                </div>
                <div class="account-txt">
                    with the password
                </div>
                <div class="account-password">
                    a1234#90
                </div>
            </div> -->

            <!-- <div class="successful-info">
                Please record this information and send this to the relevant party. 
                This information NOT be accessible after leaving this screen</br>
                It is advised to ask the employee to change the password after they logged in
            </div> -->

            <a href="/ezolar/Employee">
                <div class="ok-btn">
                    <div class="ok-btn-text">
                        OK
                    </div>
                </div>
            </a>
                
        </div>
    </div>
</body>
</html>