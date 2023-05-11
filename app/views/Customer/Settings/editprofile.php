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
    <?php
        require_once(__ROOT__.'\app\views\Customer\navigationpanel.php');
    ?>

<div class="common-main-container">
        <div class="dashboard-common-main-topic">
            <div class="common-main-topic-left">
                <div class="common-main-left-img">
                <a href="<?=URLROOT?>/user/profile" “text-decoration: none”>
                    <img src="\ezolar\public\img\admin\back.png">
                </a>
            </div>
            <div class="common-main-txt">
                Edit Profile
            </div>
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
                    <div class="form-item-text" id ="name-label">
                        Name :<span class="star">*</span><span class="err-box" id="name-err"></span>
                    </div>
                    <input class="form-item-input" name="name" id="name" type="text" value="' . $row ->name . '" required onkeyup="validateName()">
                </div>
                <div class="form-item-container">
                    <div class="form-item-text" id="email-label">
                        Email :<span class="star">*</span><span class="err-box" id="email-err"></span>
                    </div>
                    <input class="form-item-input" name="email" id="email" type="text" value="' . $_SESSION['user_email'] . '" required onkeyup="validateEmail()">
                </div>
                <div class="form-item-container">
                    <div class="form-item-text">
                        Address :
                    </div>
                    <input class="form-item-input" name="address" id="address" type="text" value="' . $row ->address . '">
                </div>
                <div class="form-item-container">
                    <div class="form-item-text">
                        Contact Number :<span class="star">*</span><span class="err-box" id="mobile-err"></span>
                    </div>
                    <input class="form-item-input" name="mobile" id="mobile" type="text" value="' . $row ->mobile . '" required onkeyup="validateTelNo()">
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
                    <button type="submit" name="sub" id="submitbtn" class="submitbtn" onclick=document.getElementById('."'id01'".').style.display='."'block'".';>Submit</button>
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
<script>
    function validateName(){
        var fname = document.getElementById('name').value;
        var regName = /^[a-zA-Z]+ [a-zA-Z]+$/
        if(fname === ""){
            document.getElementById("name-err").innerHTML='This field is required';
        }
        else{
            if(!regName.test(fname)){
                document.getElementById("name-err").innerHTML='Enter a valid name';
                return false;
            }else{
                if(fname.length>45){
                document.getElementById("name-err").innerHTML='Exceed character limit';
                return false;
                }
                else{
                document.getElementById("name-err").innerHTML = " ";
                return true;

                }
            }
        }
    }
    function validateEmail(){
        var email = document.getElementById("email").value;
        var format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        
        if (email.match(format)){
            document.getElementById("email-err").innerHTML = "";
            return true;
        }
        else{
            document.getElementById("email-err").innerHTML = "Enter a Valid Email";
            return false;
        }
        //  document.getElementById("email-err").innerHTML = "aaaaaaaaaaaaa"
    }
    function validateTelNo(){
        var mobileN = document.getElementById("mobile").value;
        if(mobileN.length>10 || mobileN.length<10){
            document.getElementById("mobile-err").innerHTML='Length : 10 characters';
            return false;
        }else {
            if(isNaN(mobileN)){
                document.getElementById("mobile-err").innerHTML='Contact Number should contain numbers';
                return false;
            }
            else{
                document.getElementById("mobile-err").innerHTML = "";
                return true;
            }
        }
    }

    function validateEditProfile(){
        if(!validateName() || !validateTelNo() || !validateEmail()){
            document.querySelector(".submitbtn").disabled = true;
            document.querySelector(".submitbtn").style.backgroundColor = grey;
            return false;
        }
        else{
            document.querySelector(".submitbtn").disabled = false;
            return true;
        }
    }
</script>
</body>
</html>
