<?php
    //  define('__ROOT__', dirname(dirname(dirname(__FILE__))));

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
    <style>
        .box4{
            color: #ffffff;
            background-color: #0b2f64;
        }
        .box3{
            color: #0b2f64;
            background-color: #ffffff;
        }
    </style>
</head>
<body>
<div class="body-container">
    <?php
        require_once(__ROOT__.'\app\views\Contractor\navigationpanel.php');
    ?>
    <!-- Remaining... -->
    <div class="common-main-container">
        <div class="dashboard-common-main-topic">
            <div class="common-main-topic-left">
                <div class="common-main-left-img">
                    <a href=”” “text-decoration: none”>
                        <img src="\ezolar\public\img\customer\Issue.png" alt="inquiry">
                    </a>
                </div>
                <div class="common-main-txt">
                    Report an Issue
                </div>
            </div>
 
        </div>
        <div class="right-content">
            <form name="Inquiry Form" action="/ezolar/inquiry/newInquiry" method="POST">
                <div class="topic-container">
                    Topic:<span class="star">*</span><span class="err-box" id="topic-err"></span></br>
                    <input class="topic-box" name="topic-box" id="topic-box" type="text" required>
                </div>
                <div class="type-id-container">
                    <div class="type-container">
                            Type:<span class="star">*</span></br>
                        <select class="type-box" name="inquiry-type" id="inquiry-type" type="text" required>
                            <option value="general">General</option> 
                            <option value="warrenty">Warrenty</option> 
                            <option value="troubleshoot">Troubleshoot</option>
                        </select> 
                    </div>
                    <div class="id-container">
                            Project ID:</br>
                        <input class="id-box" name="id-box" id="id-box" type="text">
                    </div>
                </div>
                <div class="msg-container">
                    Message:<span class="star">*</span><span class="err-box" id="msg-err"></span></br>
                    <textarea class="msg-box" name="msg-box" id="msg-box" type="text" rows="6" cols="50" required></textarea>
                </div>
                <div class="inquiry-btns">
                <!-- <button class="clearbtn">Clear</button> -->
                    <button class="sendbtn" type="submit" id="inq-submit">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class = "f">
    <?php 
          $this->view('Includes/footer', $data);
    ?>
</div>
    <script src="public\js\validation.js"></script>
</body>
</html>