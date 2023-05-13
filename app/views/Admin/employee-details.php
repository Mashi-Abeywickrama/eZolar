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
    <link rel="stylesheet" href="\ezolar\public\css\common\profile.css">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <title>My Projects</title>
</head>
<body>
<?php require_once(__ROOT__.'/app/views/popupList/confirmationPopup.php');?> 

<div class="body-container">
    <div class="left-panel">
        <a href="<?=URLROOT?>/user/dashboard"><div class ="box1">
            Admin Dashboard
        </div></a>
        <div class="rest">
            <div class="rest-top">
            <a href="<?=URLROOT?>/Employee"><div class="box7" style="color: #ffffff;background-color: #0b2f64;">
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
            <a href="<?=URLROOT?>/AdminViewProfile"><div class="box5" style="color: #0b2f64;background-color: #ffffff;">
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
                            <button class="delete-profile-btn" id="del_btn">Deactivate Profile</button>
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
</div>
<div class = "f">
<?php
$this->view('Includes/footer', $data);
?>
</div>
<script>
    var del_btn = document.getElementById('del-btn');
    var text_box = document.getElementById('text');
    var yes_btn = document.getElementById('yes-btn');
    var no_btn = document.getElementById('no-btn');

    del_btn.addEventListener('click', function()
    {
        text_box.innerHTML = "This will Delete the product \"<?php echo $row -> productName;?>\" <br> Do you wish to proceed?";
        yes_btn.setAttribute("href", "/ezolar/Product/removeProduct/<?php echo $row -> productID;?>");
        document.getElementById("confirm-pop").style.display="block";
    });
    
</script>
</body>
</html>

<!--<a href="ezolar/Employee/editEmployeeView/'.$row -> empID.'">-->
<!--    <button class="edit-profile-btn">Edit Profile</button>-->
<!--</a>-->


