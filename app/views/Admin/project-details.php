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
    <link rel="stylesheet" href="\ezolar\public\css\engineer.projects.css">
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
    <div class="dashboard-common-main-topic" style ="margin-left: 0; margin-top: 0; justify-content:start; align-items:center;">
            <div class="common-main-left-img">
                <a href="<?=URLROOT?>/AdminProject" style= “text-decoration: none”>
                    <img src="\ezolar\public\img\storekeeper\Back.png" alt="Back Button">
                </a>
            </div>
            <div class="common-main-txt">
                Project : <?php echo strtoupper($_SESSION['row']->projectID);?>
            </div>
            
            </div>
            <div class="project-details-container" style="width:100%">
                <div class="project-details-inline-container">
                    <div class="project-details-basic-container">
                        <p class="project-details-basic-status-text"><b>Project Status : <?php echo strtoupper($_SESSION['rows']['StatusName']); ?></b></p>
                        <p><b>Site address : </b> <?php echo $_SESSION['row']->siteAddress ?></p>
                        <p><b>Assigned Salesperson : </b> <?php echo $_SESSION['rows']['SalespersonName']?> </p>
                        <p><b>Assigned Engineer : </b> <?php echo $_SESSION['rows']['EngineerNames']?> </p>
                        <p><b>Assigned Contractor : </b> <?php echo $_SESSION['rows']['ContractorNames']?> </p>

                    </div>
                    <div class="project-details-customer-container">
                        <p><b>Customer Name </b> <br> <span style="font-size:30px;"><?php echo $_SESSION['row']->name;?></span></p>
                        <p><b>Contact Number </b> <br> <?php echo str_pad($_SESSION['row']->mobile,10,"0",STR_PAD_LEFT);?></p>
                    </div>
                </div>

                <div class="project-details-schedule-container">
                    <p><b>Inspection Date : </b><?php echo $_SESSION['rows']['InspectDates'];?></p>
                    <p><b>Delivery Date : </b><?php echo $_SESSION['rows']['DeliverDates'];?></p>
                </div>

                <div class="project-details-pack-container">
                    <p class="project-details-pack-text"><b>Package : </b> <?php echo strtoupper($_SESSION['row']->Package_packageID)?></p>
                    <?php
                    if ($_SESSION['row']->status != 'B2'){
                        $packAssignedFlag = True;
                        if ($_SESSION['row']->Package_packageID == 'Not Assigned'){
                            $packAssignedFlag = False;
                        } else {
                            echo '<a href="/ezolar/AdminProject/projectPackageDetailsPage/'.$_SESSION['row']->projectID.'"><div class="product-details-pack-btn">More Info</div></a>';
                        }
                    }
                    ?>
                </div>
                <div class="project-details-btns-container">

                    <?php 
                    if (($_SESSION['row']->status == 'A1')&& array_key_exists('receipt',$_SESSION['rows'])){
                        echo '<a href="/ezolar/SalespersonProject/verifyInspectionPaymentPage/'.$_SESSION['rows']['receipt']->receiptID.'"><div class="project-details-btns">Verify Inspection Payment</div></a>';
                    }
                    else if (($_SESSION['row']->status == 'D0')&& array_key_exists('receipt',$_SESSION['rows'])){
                        echo '<a href="/ezolar/SalespersonProject/verifyFullPaymentPage/'.$_SESSION['rows']['receipt']->receiptID.'"><div class="project-details-btns">Verify Payment</div></a>';
                    } ?>
                
                    <a href="/ezolar/AdminProject/changeEmployees/<?php echo $_SESSION['row']->projectID; ?>"><div class="project-details-btns">Change Employees</div></a>
                    <a href="/ezolar/AdminProject/paymentHistory/<?php echo $_SESSION['row']->projectID; ?>"><div class="project-details-btns">View Payment History</div></a>
                </div>
                    
                
        </div>
        
    </div>  
    </div>
<div class="f">
    <?php 
      $this->view('Includes/footer', $data);
      unset($_SESSION['rows']['receipt']);
    ?>
</div>
</body>
</html>