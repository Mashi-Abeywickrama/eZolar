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
    <div class ="fp-web-body">
        <div class="fp-web-img">
            <img class ="fp-web-img-s" src="<?=URLROOT?>/public/img/fpImg.jpg" alt="login-image">
        </div>
        <div class="fp-web-text">
            <div class="form-container-fp">
                <div class="kkkk">
                    <div class="fp-headline">
                        RESET YOUR PASSSWORD
                    </div>

                    <div class="fp-subHeader">
                        <ol>
                            <li>Enter your email address in the box below. </li>
                            <li> Click on “Send OTP” button.</li>
                            <li>You will recieve your One Time Password (OTP) via email.</li>
                        </ol>
                    </div>
                    <div class="fp-subHeader" style = "font-weight:bold">
                    Please make sure to enter the email which you used for your eZolar account.
                    </div>

                    <form class = "fp-form" name="fp Form" action="" method="POST">
                        <div class="email-div">Email</div>
                        <input class="fp-abc" name="email" id="email" type="text" placeholder="Enter your email">
                        <div class="OTP-btn-div"><button type="submit" name="emailbtn" id = "" class="OTP-btn">Send OTP</button></div>

                    </form>

                    <!-- <form class = "fp-form" action="" method="POST">
                        <div class="fp-subHeader">
                            Please check your emails and Enter the OTP (One Time Password) In the given Box.
                            <input class="abc" name="otp" id="otp" placeholder="Enter Your OTP here">
                        </div>
                        <div class = "group" >
                            <button class="resend-btn" type="submit" >Resend OTP</button>
                            <button class="submit-btn" name="OTPBtn" type="submit">Submit</button>
                        </div>
                    </form> -->

                        <div class="later-part">
                            <div class="later-part-txt">
                                Back to <a class="to-Signup-page" href="/ezolar/login" > Log In!</a>
                            </div>

                        </div>
                </div>

            </div>

    </div>
</body>
</html>