<?php
require_once(__ROOT__.'\app\views\Customer\navbar.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\salesperson.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\common\profile.css">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
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
            
            <a href="<?=URLROOT?>/Employee/EngineersAndContractors"><div class="box8" style="color: #ffffff;background-color: #0b2f64;">
            Engineers & Contractors
            </div></a>

            <a href="<?=URLROOT?>/SalespersonReports"><div class="box9">
            Reports
            </div></a>

        </div>
        <div class="rest-bottom">
            <a href="<?=URLROOT?>/user/profile"><div class="box5" style="color: #0b2f64;background-color: #ffffff;">
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
                <a href="/ezolar/Employee/EngineersAndContractors">
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
            </div>
        </div>
    </div>
';
        }
        ?>

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

<!--<a href="ezolar/Employee/editEmployeeView/'.$row -> empID.'">-->
<!--    <button class="edit-profile-btn">Edit Profile</button>-->
<!--</a>-->



