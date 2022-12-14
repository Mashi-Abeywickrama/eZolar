<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public\css\login.css">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <title>eZolar user Login</title>
</head>
<body>
    <div class="web-body">
        <div class="form-container">
            <div class="headline">
                WELCOME BACK
            </div>
            <div class="subHeader">
                Please enter your username and password.
            </div>
            <div class="form-container-login">
                <form name="Login Form" action="/ezolar/user/login" method="POST">
                    <p>Email <br>
                    <input class="abc" name="email" id="email" type="text" placeholder="Enter your email">
                    </p>
                    <p>Password <br>
                        <input class="abc" name="password" id="password" type="password" placeholder="********">
                    </p>
                    <p>
                        <div class="remm"><input id="check" type="checkbox"> Remember Me </div>
                        <div class="remm-fp"><a class="to-fp-page"> Forgot Password?</a></div>
                        <button class="SignInbtn" >Sign In</button>
                    </p>
                </form>
                <div class="later-part">
                    <div class="later-part-txt">
                        Don’t have an account?<a class="to-Signup-page" href="/ezolar/register" > Sign up!</a>
                    </div>
                    <!-- <div class="later-part-signup">
                        Sign up!
                    </div> -->
                </div>
            </div>

        </div>
    </div>
</body> 
</html>