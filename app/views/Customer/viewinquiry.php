<?php
    //  require_once(__ROOT__.'\app\views\Includes\header.php');
     require_once(__ROOT__.'\app\views\Customer\navbar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\customer.newinquiry.css">
    <title>My newInquiry</title>
</head>
<body>
<div class="body-container">
    <?php
        require_once(__ROOT__.'\app\views\Customer\navigationpanel.php');
    ?>
    <!-- Remaining... -->
    <div class="common-main-container">
        <div class="dashboard-common-main-topic">
            <div class="common-main-topic-left">
                <div class="common-main-left-img">
<!-- need to embed the link of my profile in the image -->
                    <a href=”” “text-decoration: none”>
                        <img src="\ezolar\public\img\customer\Inquiry.png" alt="inquiry">
                    </a>
                </div>
                <div class="common-main-txt">
                    View Inquiry
                </div>
            </div>
            <div class="common-main-right-img">
                <img src="\ezolar\public\img\profile.png" alt="profile">
            </div>    
        </div>

    <div class="right-content-detail">
        <?php
            $result = $_SESSION['rows'];
            echo '
            <div class="topic-container">
                Topic:</br>
                <input class="topic-box" name="topic-box" id="topic-box" type="text" placeholder = "'.  $result[0] -> topic .'" readonly>
            </div>
            <div class="type-id-container">
                <div class="type-container">
                        Type:</br>
                    <input class="type-box" name="inquiry-type" id="inquiry-type" type="text"  placeholder = "'.  $result[0] -> type .'"readonly>
                </div>
                <div class="id-container">
                        Project ID:</br>
                    <input class="id-box" name="id-box" id="id-box" type="text" readonly>
                </div>
            </div>
            <div class="msg-container">
                Message:</br>
                <textarea class="msg-box" name="msg-box" id="msg-box" type="text" rows="6" cols="50" placeholder = "'.  $result[0] -> message .'" readonly></textarea>
            </div>
            <div class="msg-container">
                Response:</br>
                <textarea class="msg-box" name="msg-box" id="msg-box" type="text" rows="6" cols="50" placeholder = "'.  $result[0] -> message .'" readonly></textarea>
            </div>'
            ?>
            <div class="inquiry-btns">
                <button class="sendbtn" id="inq-submit" onclick="location.href='../'">OK</button>
            </div>
    </div>
    <!-- <div class="footer-div">
    <?php

     require_once(__ROOT__.'\app\views\Includes\footer.php');
?> -->
</div>
</div>
</div>
</body>

</html>