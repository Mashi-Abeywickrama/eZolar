<?php
     define('__ROOT__', dirname(dirname(dirname(__FILE__))));
     require_once(__ROOT__.'\views\Includes\header.php');
     require_once(__ROOT__.'\views\Includes\navbar.php');
     require_once(__ROOT__.'\views\Includes\footer.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public\css\signup.css">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <title>eZolar sign up</title>
</head>
<body>
    <div class="form-container">
        <div class="headline">
            Registration Form <br>
            <span class="err-box" id="final-err"><?php
                if(!empty($_SESSION['err'])){
                    echo $_SESSION['err'];
                    unset($_SESSION['err']);
                }
            ?></span>
            <script>
                setTimeout(()=>{
                    const err=document.getElementById('final-err')
                    err.style.visibility="hidden"
                },3000);
            </script>
        </div>
        <div class="form-container-signup">
            <form name="Login-Form" action="/ezolar/register/dashboard" method="POST">
                <div class="group-container">
                    <div class="first-container">
                        <div>
                            First name
                            <span class="star">*</span>
                            <span class="err-box" id="fname-err"></span>
                        </div>
                        <input class="input-box" name="fname" id="fname" type="text" required onkeyup="validatefName()">
                    </div>
                    <div class="second-container">
                        <div class="err">
                            Last name
                            <span class="star">*</span>
                            <span class="err-box" id="lname-err"></span>
                        </div>
                        <input class="input-box" name="lname" id="lname" type="text" required onkeyup="validatelName()">
                    </div>
                </div>
                <div class="group-container">
                    <div class="first-container">
                    <div class="err">
                        Email
                            <span class="star">*</span>
                            <span class="err-box" name="emailErr" id="email-err"></span>
                        </div>
                        <input class="input-box" name="email" id="email" type="text" required onkeyup="validateEmail()">
                    </div>
                    <div class="second-container">
                        <div class="err">
                            Phone Number
                            <span class="star">*</span>
                            <span class="err-box" id="mobile-err"></span>
                        </div>
                        <input class="input-box" name="mobile" id="mobile" type="text" required onkeyup="validateTelNo()">
                    </div>
                </div>
                <div class="group-container">
                    <div class="first-container">
                        <div class="err">
                            NIC Number
                            <span class="star">*</span>
                            <span class="err-box" id="nic-err"></span>
                        </div>
                        <input class="input-box" name="nic" id="nic" type="text" required onkeyup="validateNIC()">
                    </div>
                    <div class="second-container">
                            Home Address
                        <input class="input-box" name="home" id="home" type="text" >
                    </div>
                </div>
                <div class="group-container">
                    <div class="first-container">
                        <div class="err">
                            Password
                            <span class="star">*</span>
                            <span class="err-box" id="pwd-err"></span>
                        </div>
                        <input class="input-box" name="pwd" id="pwd" type="password" required>
                    </div>
                    <div class="second-container">
                        <div class="err">
                            Confirm Password
                            <span class="star">*</span>
                            <span class="err-box" id="cpwd-err"></span>
                        </div>
                        <input class="input-box" name="cpwd" id="cpwd" type="password" required onkeyup="validatePassword()">
                    </div>
                </div>
                <button class="Signupbtn" name="help" type="submit" onclick="return validateForm()">Register</button>
            </form>
            <div class="later-part">
                <div class="later-part-txt">
                    Already have an account?<a class="to-Signin-page" href="/ezolar/login"> Log In!</a>
                </div>
            </div>
        </div>
        
    </div>
    <script src="public\js\validation.js"></script>
</body>
</html>