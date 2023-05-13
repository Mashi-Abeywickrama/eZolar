<?php
    // define('__ROOT__', dirname(dirname(dirname(__FILE__))));
    require_once(__ROOT__.'\app\views\Includes\header.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.common.css">
</head>
<body>
   <div class="body-container-404">
    <!-- insert image here -->
    <div class="e404-img">
        <img src="\ezolar\public\img\customer\404-error.png" alt="404-error">
    </div>
    <!-- now lets add a text under this image -->
    <div class="error-msg-404">
    <p>Access Denied! You may not have permission to access this page. <br>  
    <a  class="to-dashboard-anchor" href="<?=URLROOT?>/user/dashboard" style="text-decoration:none; font-weight:bold; color:#DE8500">Go back safe! </a><p>
    </div>

   </div> 
   <div class="f">
    <?php
        require_once(__ROOT__.'\app\views\Includes\footer.php');
        ?>
   </div>
</body>
</html>