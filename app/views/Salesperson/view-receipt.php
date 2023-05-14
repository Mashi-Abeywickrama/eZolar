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
    <link rel="stylesheet" href="\ezolar\public\css\engineer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\salesperson.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\engineer.projects.css">
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\projects.css">
    <title>My Projects</title>
</head>
<body>
<div class="body-container">
<div class="left-panel">
        <a href="<?=URLROOT?>/user/dashboard"><div class ="box1">
            Salesperson Dashboard
        </div></a>
        <div class="rest">
            <div class="rest-top">
            <a href="<?=URLROOT?>/SalespersonProject"><div class="box7">
                    Assigned Projects
                </div></a>
            <a href="<?=URLROOT?>/Inquiry/getSalespersonInquiries"><div class="box2">
                    Inquiries
            </div></a>
            <a href="<?=URLROOT?>/SalespersonSchedules/InspectionSchedule"><div class="box3">
                Inspection Schedule
            </div></a>
            <a href="<?=URLROOT?>/SalespersonSchedules/DeliverySchedule"><div class="box4">
                Delivery Schedule
            </div></a>
            
            <a href="<?=URLROOT?>/Employee/EngineersAndContractors"><div class="box8">
            Engineers & Contractors
            </div></a>
            <a href="<?=URLROOT?>/SalespersonReports"><div class="box9">
            Reports
            </div></a>

        </div>
        <div class="rest-bottom">
            <a href="<?=URLROOT?>/user/profile"><div class="box5">
                Profile
            </div></a>
            <a href="<?=URLROOT?>/"><div class="box6">
                Settings
            </div></a>
            </div>
        </div>
    </div>
    <div class="common-main-container">
        <div class="dashboard-common-main-topic" style ="margin-left: 0; margin-top: 0; justify-content:start; align-items:center;">
            <div class="common-main-left-img">
                <a href="<?=URLROOT?>/SalespersonProject/paymentHistory/<?php echo $_SESSION['row']->Project_projectID?>" style= “text-decoration: none”>
                    <img src="\ezolar\public\img\storekeeper\Back.png" alt="Back Button">
                </a>
            </div>
            <div class="common-main-txt">
                Verify Receipt : <?php echo str_pad($_SESSION['row']->receiptID,6,"0",STR_PAD_LEFT);?>
            </div>    
            </div>
            <div class="receipt-details-container">
                <p><b>Project ID : </b> <?php echo strtoupper($_SESSION['row']->Project_projectID) ?></p>
                <p><b>Payment Purpose : </b> <?php echo $_SESSION['row']->receiptPurpose ?></p>
                <p><b>Recieved Date:  </b> <?php echo substr($_SESSION['row']->uploadedTime,0,10) ?></p>
                <p><b>Verified Date:  </b> <?php echo $_SESSION['row']->verifiedDate ?></p>
            </div>
            <div class="receipt-image-container">
                <img src="\ezolar\public\img\payments\<?php echo $_SESSION['row']->scan ?>" alt="Receipt" class="receipt-iamge">
            </div>

            <div class="receipt-btn-container">
                <a href="\ezolar\public\img\payments\<?php echo $_SESSION['row']->scan ?>" class="receipt-btn" download> Download Receipt</a>
            </div>
                    
                    
                
        </div>
        
    </div>  
    </div>
<div class="f">
    <?php 
      $this->view('Includes/footer', $data);
    ?>
</div>
</body>
</html>