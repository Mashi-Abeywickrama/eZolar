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
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\inquiries.css">
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
            <a href="<?=URLROOT?>/Project/SalespersonViewProjects"><div class="box7">
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
                <img src="\ezolar\public\img\customer\Inquiry.png" alt="Inquiry">
            </a>
        </div>
        <div class="common-main-txt">
            Inquiries
        </div>

        <div class="common-main-right-img">
            <img src="\ezolar\public\img\profile.png" alt="profile">
        </div>
    </div>
    <div class="inquiry-list-container">

        <div class="new-inquiry-list-container">
            <div class="inquiry-list-topic">
                New Inquiries
            </div>

            <?php
            
            $results = $_SESSION['rowsNew'];
            foreach($results as $rowNew){

                echo '<div class="inquiry-box-new">
                        <div class="inquiry-text-container">

                            <div class="inquiry-text-container-inner">
                                <div class="inquiry-text-no">Type:' .  $rowNew -> type . '</div>
                                <div class="inquiry-text-name"><b>Topic :' . $rowNew -> topic . '</b></div>
                            </div>
                        </div>
                        <div class="inquiry-details-btn-container" >
                    
                            <a href="/ezolar/Inquiry/viewSalespersonInquiry/'.$rowNew -> inquiryID.'">
                                <div class="inquiry-details-btn">
                                    <div class="inquiry-details-btn-text">Respond</div>
                                </div>
                            </a>
                        </div>
                        </div>';
            }
            ?>
        </div>

        <div class="new-inquiry-list-container">
            <div class="inquiry-list-topic">
                Ongoing Inquiries
            </div>
        <?php
        $results = $_SESSION['rows'];
        foreach($results as $row){

            echo '<div class="inquiry-box">
                        <div class="inquiry-text-container">
                            <div class="inquiry-text-container-inner">
                                <div class="inquiry-text-no">Type:' .  $row -> type . '</div>
                                <div class="inquiry-text-name"><b>Topic :' . $row -> topic . '</b></div>
                            </div>
                        </div>
                        <div class="inquiry-details-btn-container" >
                    
                            <a href="/ezolar/Inquiry/viewSalespersonInquiry/'.$row -> inquiryID.'">
                                <div class="inquiry-details-btn">
                                    <div class="inquiry-details-btn-text">Respond</div>
                                </div>
                            </a>
                        </div>
                        
                    </div>';
        }
        ?>
        </div>

    </div>

</div>
</div>
<?php unset($_SESSION['rows'],$_SESSION['rowsNew'])?>
<div class = "f">
<?php
$this->view('Includes/footer', $data);
?>
</div>
</body>
<script type="text/javascript" src="\ezolar\public\js\inquiry.js"></script>
</html>

