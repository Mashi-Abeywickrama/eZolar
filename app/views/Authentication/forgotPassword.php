<?php
     define('__ROOT__', dirname(dirname(dirname(__FILE__))));
     require_once(__ROOT__.'\views\Includes\header.php');
     require_once(__ROOT__.'\views\Includes\navbar1.php');
     require_once(__ROOT__.'\views\Includes\footer.php');
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
    <div class="fp-form-container ">
        
        <div class="form-container-fp">
            <div class="kkkk">
                <div class="fp-headline">
                    RESET YOUR PASSSWORD
                </div>

                <div class="fp-subHeader">
                Please enter your email address below and click on “Send OTP” button. You will recieve an OTP via email.
                </div>

                <!-- <form name="fp Form" action="" method="POST"> -->
                    <div class="email-div">Email</div>
                    <input class="abc" name="email" id="email" type="text" placeholder="Enter your email">
                    <div class="OTP-btn-div"><button class="OTP-btn" >Send OTP</button></div>
                    <div class="fp-subHeader">
                        Please check your emails and Enter the OTP (One Time Password) In the given Box.
                        <input class="abc" name="otp" id="otp" placeholder="Enter Your OTP here">
                    </div>
                    <div class = "group" >
                        <button class="resend-btn" type="submit" >Resend OTP</button>
                        <button class="submit-btn" type="submit">Submit</button>
                    </div>

                    <div class="later-part">
                        <div class="later-part-txt">
                            Remember your Password? <a class="to-Signup-page" href="/ezolar/login" > Sign In!</a>
                        </div>

                    </div>
            </div>
            
        </div>

    </div>
</body>
</html>