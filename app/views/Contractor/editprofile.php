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

            echo '
            <script>
                document.getElementById('."'id01'".').style.display='."'block'".';
            </script>
            
            ';
        }
    ?>
<div class="body-container">
    <?php
        require_once(__ROOT__.'\app\views\Contractor\navigationpanel.php');
    ?>

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

    echo '
        
    <div class="form-background-edit">

        <form class="form-container" action="/ezolar/user/updateprofile" method="POST" enctype="multipart/form-data">
            <div class="form-inline">
                <div class="form-item-container">
                    <div class="form-item-text">
                        Name :
                    </div>
                    <input class="form-item-input" name="name" id="name" type="text" value="' . $data['rows'][0]->name . '">
                </div>
                <div class="form-item-container">
                    <div class="form-item-text">
                        Email :
                    </div>
                    <input class="form-item-input" name="email" id="email" type="text" value="' . $_SESSION['user_email'] . '">
                </div>
                
                <div class="form-item-container">
                    <div class="form-item-text">
                        Contact Number :
                    </div>
                    <input class="form-item-input" name="mobile" id="mobile" type="text" value="' . $data['rows'][0]->telno . '">
                </div>
                <div class="form-item-container">
                    <div class="form-item-text">
                        NIC Number :
                    </div>
                    <input class="form-item-input" name="nic" id="nic" type="nic" value="' . $data['rows'][0]->nic . '" readonly>
                </div>
                <div class="form-item-container">
                    <div class="form-item-text">
                        Bio :
                    </div>
                    <input class="form-item-input" name="bio" id="bio" type="text" value="' . $data['rows'][0]->bio . '">
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
    
?>

</div>
</div>
<div class = "f"> 
    <?php require_once(__ROOT__.'\app\views\Includes\footer.php'); ?>
</div>
<script type="text/javascript" src="\ezolar\public\js\validation.js"></script>
</body>
</html>
