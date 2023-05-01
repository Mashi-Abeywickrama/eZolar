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
        <div class="dashboard-common-main-topic">
            <div class="common-main-left-img">
                <a href=”” “text-decoration: none”>
                    <img src="\ezolar\public\img\engineer\Projects.png" alt="projects-icon">
                </a>
            </div>
            <div class="common-main-txt">
                Assigned Project : <?php echo strtoupper($_SESSION['row']->projectID);?>
            </div>
            
            </div>
            <div class="project-details-container">
                <div class="project-details-inline-container">
                    <div class="project-details-basic-container">
                        <p class="project-details-basic-status-text"><b>Project Status : <?php echo strtoupper($_SESSION['rows']['StatusName']); ?></b></p>
                        <p><b>Site address : </b> <?php echo $_SESSION['row']->siteAddress ?></p>
                        <p><b>Assigned Salesperson ID : </b> <?php echo $_SESSION['row']->Salesperson_Employee_empID ?> </p>
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
                            echo '<a href="/ezolar/SalespersonProject/projectPackageDetailsPage/'.$_SESSION['row']->projectID.'"><div class="product-details-pack-btn">More Info</div></a>';
                        }
                    }
                    ?>
                </div>

                    <?php 
                    if (($_SESSION['row']->status == 'A0')&& array_key_exists('receipt',$_SESSION['rows'])){
                        echo '<div class="project-details-btns-container">
                        <a href="/ezolar/SalespersonProject/verifyInspectionPaymentPage/'.$_SESSION['rows']['receipt']->receiptID.'"><div class="project-details-btns">Verify Inspection Payment</div></a>';
                        echo '</div>';
                    }
                    else if (($_SESSION['row']->status == 'D0')&& array_key_exists('receipt',$_SESSION['rows'])){
                        echo '<div class="project-details-btns-container">
                        <a href="/ezolar/SalespersonProject/verifyFullPaymentPage/'.$_SESSION['rows']['receipt']->receiptID.'"><div class="project-details-btns">Verify Payment</div></a>';
                        echo '</div>';
                    } ?>
                    
                    
                
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