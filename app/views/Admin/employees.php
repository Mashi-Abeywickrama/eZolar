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
    <link rel="stylesheet" href="\ezolar\public\css\admin\admin.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\admin\employees.css">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <title>My Projects</title>
</head>
<body>

<div class="body-container">
    <div class="left-panel">
        <a href="<?=URLROOT?>/user/dashboard"><div class ="box1">
            Admin Dashboard
        </div></a>
        <div class="rest">
            <div class="rest-top">
            <a href="<?=URLROOT?>/Employee"><div class="box7" >
                    Employees
            </div></a>
            <a href="<?=URLROOT?>/AdminProject"><div class="box9">
                    Projects
            </div></a>
            <a href="<?=URLROOT?>/Package"><div class="box2">
                    Packages
            </div></a>
            <a href="<?=URLROOT?>/Product"><div class="box3">
                    Products
            </div></a>
            <a href="<?=URLROOT?>/Statistics/salesPerMonth"><div class="box4">
                    Reports
            </div></a>
            <a href="<?=URLROOT?>/AdminIssue"><div class="box8">
                    Issues
            </div></a>
            

        </div>
        <div class="rest-bottom">
            <a href="<?=URLROOT?>/AdminViewProfile"><div class="box5">
                Profile
            </div></a>
            <a href="<?=URLROOT?>/"><div class="box6">
                Settings
            </div></a>
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
                Employees
            </div>

            <div class="common-main-right-img">
                <img src="\ezolar\public\img\profile.png" alt="profile">
            </div>  
        </div>
        

        <div class="dashboard-container">
        <a href="/ezolar/Employee/getEmployees/engineer">
            <div class="dashboard-container-content">
                <div class="dashboard-container-txt">
                    Engineers
                </div>
            </div>
        </a>

        <a href="/ezolar/Employee/getEmployees/storekeeper">
            <div class="dashboard-container-content">
                <div class="dashboard-container-txt">
                    Storekeepers
                </div>
            </div>
        </a>    

        <a href="/ezolar/Employee/getEmployees/salesperson">
            <div class="dashboard-container-content">
                <div class="dashboard-container-txt">
                    Salespeople
                </div>
            </div>
        </a>    

        <a href="/ezolar/Employee/getEmployees/contractor">
            <div class="dashboard-container-content">
                <div class="dashboard-container-txt">
                    Contractors
                </div>
            </div>
        </a>

        </div>
        <a href="/ezolar/Employee/addEmployee">
            <div class="add-employee-btn-container">
                <div class="add-employee-btn">
                    <div class="add-employee-btn-text">
                        Add Employee
                    </div>
                </div>
            </div>
        </a>
    </div>
    </div>
<div class = "f">
<?php
$this->view('Includes/footer', $data);
?>
</div>
</body>
</html>