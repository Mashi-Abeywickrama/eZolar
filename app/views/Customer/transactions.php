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
    <?php
        require_once(__ROOT__.'\app\views\Customer\navigationpanel.php');
    ?>

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
                                <div class="transaction-text-name">Transaction Purpose : ' . $row -> receiptPurpose . '</div>
                                <div class="transaction-text-no">Verification: ' .  $row -> isVerified . '</div>
                            </div>
                        </span>
                        <span class="transaction-details-btn-container">
                            <a href="'.URLROOT.'/transaction/transactionDetails/'.$row -> receiptID.'" style ="color: #FFFFFF "><div class="transaction-details-btn">
                                <span class="transaction-details-btn-text">More info</span>
                            </div></a>
                            
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
