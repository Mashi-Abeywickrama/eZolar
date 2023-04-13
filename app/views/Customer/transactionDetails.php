<?php
    //  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
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
    <link rel="stylesheet" href="\ezolar\public\css\customer.transaction.css">
    <title>My transactions</title>
</head>
<body>
<div class="body-container">
    <div class="left-panel">
        <a href="<?=URLROOT?>/user/dashboard"><div class ="box1">
            Customer Dashboard
        </div></a>
        <div class="rest">
            <div class="rest-top">
            <a href="<?=URLROOT?>#"><div class="box7">
                    Packages
                </div></a>
            <a href="<?=URLROOT?>/project"><div class="box2">
                    My Projects
                </div></a>
                <a href="<?=URLROOT?>/inquiry"><div class="box3">
                    Inquiries
                </div></a>
                <a href="<?=URLROOT?>/transaction"><div class="box4">
                    Transactions
                </div></a>
            </div>
            <div class="rest-bottom">
            <a href="<?=URLROOT?>/user/profile"><div class="box5">
                    Profile
                </div></a>
                <a href="<?=URLROOT?>/customersettings"><div class="box6">
                    Settings
                </div></a>
            </div>
        </div>
    </div>

    <div class="common-main-container">
        <div class="dashboard-common-main-topic">
            <div class="common-main-topic-left">
                <div class="common-main-left-img">
                    <a href=”#” “text-decoration: none”>
                        <img src="\ezolar\public\img\customer\Cash.png" alt="transaction">
                    </a>
                </div>
                <div class="common-main-txt">
                    Transactions
                </div>
            </div>
           
        </div>

        <div class="body-list-container">
            <?php
            $results = $_SESSION['rows'];
            foreach($results as $row){
                echo '<div class="transaction-box">
                        <span class="transaction-text-container">
                            <div class="transaction-text-container-inner">
                                <div class="transaction-text-no">Project ID: ' .  $row -> Project_projectID . '</div>
                                <div class="transaction-text-name"><b>Transaction No : ' . $row -> receiptID . '</b></div>
                                <div class="transaction-text-no">Verification: ' .  $row -> isVerified . '</div>
                            </div>
                        </span>
                        <span class="transaction-details-btn-container">
                            <div class="transaction-details-btn">
                                <span class="transaction-details-btn-text"><a href="' .URLROOT. '/transaction/transactiondetails" style = "color: #FFFFFF">More info</a></span>
                            </div>
                        </span>
                        
                    </div>';
            }
            ?>
            
        </div>
    </div>
</div>
<div class = "f">
    <?php 
          $this->view('Includes/footer', $data);
    ?>
</div>
</body>

</html>
