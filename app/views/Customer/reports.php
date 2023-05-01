<?php
    define('__ROOT__', dirname(dirname(dirname(__FILE__))));
    require_once(__ROOT__.'\views\Customer\navbar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\customer.budgetcal.css">
    <title>user reports</title>
</head>
<body>
<div class = "body-container-main">
<div class="body-container">

    <!-- left navigation panel of customer -->
    <?php
        require_once(__ROOT__.'\views\Customer\navigationpanel.php');
    ?>

    <!-- Remaining... -->
    <div class="common-main-container">
        <div class="dashboard-common-main-topic">
            <div class="common-main-topic-left">
                <div class="common-main-left-img">
                    <img src="\ezolar\public\img\Cal.png" alt="Calculator">
                </div>
                <div class="common-main-txt">
                    Reports 
                </div>
            </div>    
        </div>

    <div class="right-content">
    

    </div>
</div>
</div>

<!-- add footer to the page -->
<div class="f">
    <?php 
      $this->view('Includes/footer', $data);
    ?>
</div>
<div>
</body>
</html>