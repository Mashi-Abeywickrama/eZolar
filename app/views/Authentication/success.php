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
    <title>Registration Success</title>
</head>
<body>
    <div class="successful-container">
        <div class="successful-image">
            <img src="\ezolar\public\img\customer\success.png" alt="correct-icon">
        </div>
        <div class="successful-text">
            Account Created Successfully
        </div>
        <a href="/ezolar/login">
            <div class="ok-btn">
                <div class="ok-btn-text">
                    OK
                </div>
            </div>
        </a>
    </div>
    
</body>
</html>