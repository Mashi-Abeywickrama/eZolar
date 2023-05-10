<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\style.css">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <title>eZolar Navbar</title>
</head>
<body>
    <div class="nav">
    <!--    to do
        1. add necessary links once you have created the relevant page
        2. set logout
    -->
        <div class="nav-left">
            <div class="home"><a class="links" "home" href="<?=URLROOT?>/user/home">Home</a></div>
            <div class="packages"><a class="links" "link-packages" href="<?=URLROOT?>/index/packages">Packages</a></div>
            <div class="abt"><a class="links" "about" href="<?=URLROOT?>/index/about">About Us</a></div>
            <div class="contact"><a class="links" "link-contact" href="<?=URLROOT?>/index/contact">Contact</a></div>
            <div class="dash"><a class="links" "link-dash" href="<?=URLROOT?>/user/dashboard">Dashboard</a></div>
        </div>
        <!-- <div class="nav-right">
            <div class="noti">
                <img src="\ezolar\public\img\Notifications.png" alt="Notifi">
            </div>
            <div class="btn2">
                <a href="/ezolar/user/logout"><button class="nav-btn2">Log Out</button></a>
            </div>
        </div> -->

	</div>

</body>
</html>