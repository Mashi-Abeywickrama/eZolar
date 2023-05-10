<?php
//  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
// require_once(__ROOT__.'\app\views\Includes\header.php');
require_once(__ROOT__.'\app\views\Customer\navbar.php');
// require_once(__ROOT__.'\app\views\Includes\footer.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\salesperson.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\payment-history.css">
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
    <div class="dashboard-common-main-topic" style="display:flex; justify-content:start; align-items:center;">

        <div class="common-main-left-img">
            <a href="<?=URLROOT?>/SalespersonProject/projectDetailsPage/<?php echo $_SESSION['projectID']?>" style= “text-decoration: none”>
                <img src="\ezolar\public\img\storekeeper\Back.png" alt="Back Button">
            </a>
        </div>
        <div class="common-main-txt" style="margin-left: 2%;">
            Payment History : <?php echo strtoupper($_SESSION['projectID'])?>
        </div>


    </div>
        <div class="payment-list-container">
            <?php
            $results = $_SESSION['rows'];
            if (count($results)<=0){
                echo '<div class="no-payments-text">No payments has been made for this project.</div>';
            } else {
                foreach($results as $row){
                    echo '<div class="project-box">
                                <div class="project-text-container">
                                    <div class="project-text-container-inner">
                                        <div class="project-text-no">Receipt No: ' .  str_pad($row -> receiptID, 6, "0", STR_PAD_LEFT) . '</div>
                                        <div class="project-text-name"><b>Receipt Purpose : ' . $row -> receiptPurpose . '</b></div>
                                        <div class="project-text-no">Date Recieved: ' .  substr($row -> uploadedTime,0,10) . '</div>
                                        <div class="project-text-no">Date Verified: ' .  $row -> verifiedDate . '</div>
                                    </div>
                                </div>
                                <div class="project-details-btn-container">
                                    <a href="/ezolar/SalespersonProject/viewReceipt/'.$row -> receiptID.'">
                                        <div class="project-details-btn">
                                            <div class="project-details-btn-text">View Receipt</div>
                                        </div>
                                    </a>
                                </div>
                            </div>';
                }
            }
            ?>
        </div>
    </div>
</div>
        </div>
<div class = "f">
<?php
$this->view('Includes/footer', $data);
?>
</div>
<?php unset($_SESSION['projectID'], $_SESSION['rows'])?>
</body>

</html>

