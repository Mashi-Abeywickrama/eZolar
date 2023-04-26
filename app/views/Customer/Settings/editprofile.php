<?php
require_once(__ROOT__.'\app\views\Customer\navbar.php');

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
    <?php
        require_once(__ROOT__.'\app\views\popupList\profilePopup.php');
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
    <div class="left-panel">
        <a href="<?=URLROOT?>/user/dashboard"><div class ="box1">
            Customer Dashboard
        </div></a>
        <div class="rest">
            <div class="rest-top">
            <a href="<?=URLROOT?>#"><div class="box7">
                    Packages
                </div></a>
            <a href="<?=URLROOT?>/project"><div class="box2">
                    My Projects
                </div></a>
                <a href="<?=URLROOT?>/inquiry"><div class="box3">
                    Inquiries
                </div></a>
                <a href="<?=URLROOT?>/transaction"><div class="box4">
                    Transactions
                </div></a>
            </div>
            <div class="rest-bottom">
            <a href="<?=URLROOT?>/user/profile"><div class="box5">
                    Profile
                </div></a>
                <a href="<?=URLROOT?>/customersettings"><div class="box6">
                    Settings
                </div></a>
            </div>
        </div>
    </div>

<div class="common-main-container">
        <div class="dashboard-common-heading-container">
            <div class="dashboard-common-heading-back-btn">
                <a href="<?=URLROOT?>/user/profile" “text-decoration: none”>
                    <img src="\ezolar\public\img\admin\back.png">
                </a>
            </div>
            <div class="dashboard-common-heading-text">
                <b>Edit My Profile</b>
            </div>


        </div>

<?php
$results = $_SESSION['rows'];
foreach($results as $row){
    echo '
    
    <div class="form-background-edit">

        <form class="form-container" action="/ezolar/user/updateprofile" method="POST" enctype="multipart/form-data">
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
                        Address :
                    </div>
                    <input class="form-item-input" name="address" id="address" type="text" value="' . $row ->address . '">
                </div>
                <div class="form-item-container">
                    <div class="form-item-text">
                        Contact Number :
                    </div>
                    <input class="form-item-input" name="mobile" id="mobile" type="text" value="' . $row ->mobile . '">
                </div>
                <div class="form-item-container">
                    <div class="form-item-text">
                        NIC Number :
                    </div>
                    <input class="form-item-input" name="nic" id="bio" type="nic" value="' . $row ->nic . '" readonly>
                </div>
                <div class="form-item-container">
                    <div class="form-item-text">
                        Click on the "Choose File" button to upload a profile image:
                    </div>
                    <input type="file"  id="file-input" name="fileToUpload" onchange="loadFile(this)">
                </div>
                <p><img scr="" id="output" width="200"/></p> '; ?>
                <script>
                    function loadFile(input) {
                        if(input.files && input.files[0] ) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                document.getElementById("output").src = e.target.result;
                            };
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                </script>
            <?php echo '</div>

            <div class="form-inline-button">
                <div class="cancel-btn">
                    <button class="form-cancel-btn" type="reset" value="reset" onclick="clearErrorMessage()">Cancel</button>
                </div>
                <div class="submit-btn">
                    <button type="submit" name="sub" class="form-submit-btn" onclick="document.getElementById('."'id01'".').style.display='."'block'".';"return validateEditProfile()" >Submit</button>
                </div>
            </div>
            
        </form>
    </div>
    ';
}
?>

</div>
</div>
<div class = "f"> 
    <?php require_once(__ROOT__.'\app\views\Includes\footer.php'); ?>
</div>
<script type="text/javascript" src="\ezolar\public\js\validation.js"></script>
</body>
</html>
