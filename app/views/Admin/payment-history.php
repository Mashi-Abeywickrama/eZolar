<?php
require_once(__ROOT__.'\app\views\Customer\navbar.php');
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
            Admin Dashboard
        </div></a>
        <div class="rest">
            <div class="rest-top">
            <a href="<?=URLROOT?>/Employee"><div class="box7" style="color: #0b2f64;background-color: #ffffff;">
                    Employees
            </div></a>
            <a href="<?=URLROOT?>/AdminProject"><div class="box9" style="color: #ffffff;background-color: #0b2f64;">
                    Projects
            </div></a>
            <a href="<?=URLROOT?>/Package"><div class="box2">
                    Packages
            </div></a>
            <a href="<?=URLROOT?>/Product"><div class="box3">
                    Products
            </div></a>
            <a href="<?=URLROOT?>/Statistics/salesPerMonth"><div class="box4">
                    Reports
            </div></a>
            <a href="<?=URLROOT?>/AdminIssue"><div class="box8">
                    Issues
            </div></a>
            

        </div>
        <div class="rest-bottom">
            <a href="<?=URLROOT?>/AdminViewProfile"><div class="box5">
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
            <a href="<?=URLROOT?>/AdminProject/projectDetailsPage/<?php echo $_SESSION['projectID']?>" style= “text-decoration: none”>
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
                                    <a href="/ezolar/AdminProject/viewReceipt/'.$row -> receiptID.'">
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

