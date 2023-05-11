<?php
     define('__ROOT__', dirname(dirname(dirname(__FILE__))));
     require_once(__ROOT__.'\views\Includes\header.php');
    //  require_once(__ROOT__.'\views\Includes\navbar1.php');
    //  require_once(__ROOT__.'\views\Includes\footer.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <link rel="stylesheet" href="\ezolar\public\css\login.css">
    <title>eZolar forgot password</title>
</head>
<body>
    <!-- forgot password user interface -->
    <div class ="otp-web-body">
        <div class="otp-web-img">
            <img class ="fp-web-img-s" src="<?=URLROOT?>/public/img/fpImg.jpg" alt="login-image">
        </div>
        <div class="otp-web-text">
            <div class="form-container-fp">
                    <form class = "fp-form" action="./resetpassword" method="POST">
                        <div class="fp-subHeader">
                            <ol><li>Please check your emails</li>
                            <li>Enter the OTP (One Time Password) In the given Box.</li></ol>
                            <input class="otp-abc" name="otp" id="otp" placeholder="Enter Your OTP here">
                        </div>
                        <div class = "group" >
                            <button class="resend-btn" type="submit" >Resend OTP</button>
                            <button class="submit-btn" name="OTPBtn" type="submit">Submit</button>
                        </div>
                    </form>

                </div>

            </div>

    </div>
</body>
</html>