<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\ezolar\public\css\style.css">
    <link rel="icon" href="\ezolar\public\img\logo.png" type="image/icon type">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <title>eZolar</title>
</head>
<body>
    <div class="cnav">
        <div class="cnav-left">
            <a href ="<?=URLROOT?>/index"><img class="header-logo" src="\ezolar\public\img\Logo.png" alt="Team eZolar"></a>
        </div>
        <!-- right div of header -->
        <div class="cnav-right">
            <!-- display image and name inside this div -->
            <div class="cimg-name">
                <div class="cname">
                    <p class = "myname">
                        <?php echo $_SESSION['name']?>
                    </p>
                </div>
                <div class="cimg">
                    <a href ="<?=URLROOT?>/user/profile"><img class = "myimg" src="\ezolar\public\img\user-pics\<?php echo $_SESSION['user_pic'] ?>" alt="Notifi">
                </div>
            </div>
            <div class="cbtn">
                <a href="/ezolar/user/logout"><button class="cnav-btn">Log Out</button></a>
            </div>
        </div>

	</div>

</body>
</html>