<?php
require_once(__ROOT__.'\app\views\Customer\navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\salesperson.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\common\employee-list.css">
    <title>My Projects</title>
</head>
<body>
<div class="body-container">
<div class="left-panel">
        <a href="<?=URLROOT?>/user/dashboard"><div class ="box1">
            Salesperson Dashboard
        </div></a>
        <div class="rest">
            <div class="rest-top">
            <a href="<?=URLROOT?>/SalespersonProject"><div class="box7">
                    Assigned Projects
                </div></a>
            <a href="<?=URLROOT?>/Inquiry/getSalespersonInquiries"><div class="box2">
                    Inquiries
            </div></a>
            <a href="<?=URLROOT?>/SalespersonSchedules/InspectionSchedule"><div class="box3">
                Inspection Schedule
            </div></a>
            <a href="<?=URLROOT?>/SalespersonSchedules/DeliverySchedule"><div class="box4">
                Delivery Schedule
            </div></a>
            
            <a href="<?=URLROOT?>/Employee/EngineersAndContractors"><div class="box8">
            Engineers & Contractors
            </div></a>

        </div>
        <div class="rest-bottom">
            <a href="<?=URLROOT?>/user/profile"><div class="box5">
                Profile
            </div></a>
            <a href="<?=URLROOT?>/"><div class="box6">
                Settings
            </div></a>
            </div>
        </div>
    </div>

<div class="common-main-container">
    <div class="dashboard-common-heading-and-background-container">
        <div class="dashboard-common-heading-container">
            <div class="dashboard-common-heading-back-btn">
                <a href="/ezolar/Employee/EngineersAndContractors" “text-decoration: none”>
                    <img src="\ezolar\public\img\admin\back.png" alt="back-icon">
                </a>
            </div>
            <div class="dashboard-common-heading-text">
                <b><?php echo $_SESSION['row']; unset($_SESSION['row']); ?></b>
            </div>
            <div class="dashboard-common-heading-image">
                <a href=”” “text-decoration: none”>
                    <img src="\ezolar\public\img\admin\employees.png" alt="employees-icon">
                </a>
            </div>

        </div>

        <!-- TODO -> add peofile -->
        <!-- <div class="common-main-right-img">
            <img src="\ezolar\public\img\profile.png" alt="profile">
        </div>   -->


        <div class="employee-list-container">

            <?php
            $results = $_SESSION['rows'];
            foreach($results as $row){
                echo '<div class="employee-card">
                <div class="employee-image-container">
                    <img src="\ezolar\public\img\admin\defaultProfile.png">
                </div>
                <div class="employee-text-container">
                    <div class="employee-text-container-inner">
                    <div class="employee-text-no">' . $row -> empID . '</div>
                    <div class="employee-text-name"><b>' .  $row -> name . '</b></div>
                    <div class="employee-text-price">Telephone No: ' .  $row -> telno . '</div>
                    </div>
                </div>
                <div class="employee-details-btn-container">
                    <a href="/ezolar/Employee/EmployeeDetails/'.$row -> empID.'">
                        <div class="employee-details-btn">
                            <div class="employee-details-btn-text">More info</div>
                        </div>
                    </a>
                </div>
            </div>';
            }
            ?>


        </div>

    </div>
    </div>
        </div>
<div class="f">
<?php
require_once(__ROOT__.'\app\views\Includes\footer.php');
?>
</div>
</body>

</html>
