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
    <link rel="stylesheet" href="\ezolar\public\css\customer.project.css">
    <title>My Projects</title>
</head>
<body>

    <?php

        require_once(__ROOT__.'\app\views\popupList\deliverySchedule.php');
        require_once(__ROOT__.'\app\views\popupList\payment.php');
    ?>

<div class="body-container">
    <?php
        require_once(__ROOT__.'\app\views\Customer\navigationpanel.php');
    ?>

    <div class="common-main-container">
        
            <div class="dashboard-common-heading-container">
                <div class="dashboard-common-heading-back-btn">
                    <a href="../" “text-decoration: none”>
                        <img src="\ezolar\public\img\storekeeper\Back.png">
                    </a>
                </div>
                <div class="dashboard-common-heading-text">
                <b>Ongoing Project Details</b>
                </div>
            </div>
            <div class="project-details-main-container">
                <div class="project-details-container">
                    <div class="project-progress-bar-wrapper">
                        <div class="project-progress-bar-container">
                            <div class="project-progress-bar-bullet-container">
                                <a id="c1-link"
                                    href="<?= URLROOT ?>/project/projectdetails/1?project_id=<?= $_GET['project_id'] ?>">
                                    <div id="circle-1" class="project-progress-bar-bullet-highlighted"></div>
                                </a>
                                <div class="project-progress-bar-bullet-text">Request</div>
                            </div>
                            <div class="project-progress-bar-bullet-container">
                                <a id="c2-link"
                                    href="<?= URLROOT ?>/project/projectdetails/2?project_id=<?= $_GET['project_id'] ?>">
                                    <div id="circle-2" class="project-progress-bar-bullet-highlighted"></div>
                                </a>
                                <div class="project-progress-bar-bullet-text">Inspection Scheduling</div>
                            </div>
                            <div class="project-progress-bar-bullet-container">
                                <a id="c3-link"
                                    href="<?= URLROOT ?>/project/projectdetails/3?project_id=<?= $_GET['project_id'] ?>">
                                    <div id="circle-3" class="project-progress-bar-bullet-highlighted"></div>
                                </a>
                                <div class="project-progress-bar-bullet-text">Inspection</div>
                            </div>
                            <div class="project-progress-bar-bullet-container">
                                <a id="c4-link"
                                    href="<?= URLROOT ?>/project/projectdetails/4?project_id=<?= $_GET['project_id'] ?>">
                                    <div id="circle-4" class="project-progress-bar-bullet-highlighted" style="border: 3.5px solid #2C61A3"></div>
                                </a>
                                <div class="project-progress-bar-bullet-text">Payment & Scheduling</div>
                            </div>
                            <div class="project-progress-bar-bullet-container">
                                <a id="c5-link"
                                    href="<?= URLROOT ?>/project/projectdetails/5?project_id=<?= $_GET['project_id'] ?>">
                                    <div id="circle-5" class="project-progress-bar-bullet"></div>
                                </a>
                                <div class="project-progress-bar-bullet-text">Delivery & Installation</div>
                            </div>
                        </div>
                    <div class="project-progress-bar" style="background-color: #DE8500;"  id="pro-bar1"></div>
                    <div class="project-progress-bar1" style="background-color: #DE8500;"  id="pro-bar2"></div>
                    <div class="project-progress-bar2" style="background-color: #DE8500;"  id="pro-bar3"></div>
                    <div class="project-progress-bar3"  id="pro-bar4"></div>
                </div>
                <div class="project-details-inline">
                    <div class="project-details-steps-container">
                        <span id="request-received" class="project-details-steps-text-colored">Awaiting Verification</span>
                        <?php if (($data['deliverypayment'][0]->isVerified) == 0) { 
                            echo '<span>Waiting For Verification</span>';
                         } 
                         else if (($data['deliverypayment'][0]->isVerified) == 2) {
                            echo '<span>Payment Rejected. Upload Again</span>';
                         } ?>
                        
                        <span id="salesperson-assignment" class="project-details-steps-text">Date Selection</span>
                        <span id="Contractor-assignment" class="project-details-steps-text">Contractor Confirmation</span>
                    </div>
                    <div class="project-details-info-container">
                            <b>Project No:</b>
                            <?php echo $data['project'][0]->projectID ?> <br>
                            <b>Site Location:</b>
                            <?php echo $data['project'][0]->siteAddress ?> <br>
                            <b>Package:</b>
                            <?php
                            if (($data['project'][0]->Package_packageID) == NULL) {
                                echo 'Pending ';
                            } else {
                                echo $data['project'][0]->Package_packageID;
                            }

                            ?> <br>
                            <b>Salesperson:</b>
                            <?php
                            if (($data['project'][0]->Salesperson_Employee_empID) == NULL) {
                                echo 'Pending ';
                            } else {
                                echo $data['salesperson'][0]->name;
                            }

                            ?>
                            <br>
                            <b>Inspection Date:</b>
                            <?php
                            if ($data['schedule'][0]->isConfirmed == 1) {
                                echo $data['schedule'][0]->date;
                            } else {
                                echo ' None';
                            }

                            ?>
                            <br>

                            <?php
                           
                                echo '<b>Engineer:</b> '
                                    . $data['engineer'][0]->name . '<br>';
                            

                            ?>
                            <b>Delivery Date:</b>
                            <?php
                            if ($data['dschedule'][0]->isConfirmed == 1) {
                                echo $data['dschedule'][0]->date;
                            } else {
                                echo ' None';
                            }

                            ?>
                             <br>
                            <b>Contractor name:</b>
                            <?php
                            if (empty($data['contractor'])) {
                                echo 'Not Assigned ';
                            } else {
                                echo $data['contractor'][0]->name;
                            }

                            ?>

                        </div>
                </div>
                <div class="project-details-btn-container">
                    <div class="make-payment-btn" id="make-payment-btn" onclick="document.getElementById('id03').style.display='block'">
                        <div class="make-payment-btn-text">
                        Upload Reciept 
                        </div>
                    </div>
                    <div class="add-schedule-btn" name="add-schedule-btn" id= "add-schedule-btn" onclick="document.getElementById('id06').style.display='block'">
                        <div class="add-schedule-btn-text">
                        Schedule 
                        </div>
                    </div>
                    <a href="/ezolar/project/"><div class="add-project-btn">
                        <div class="add-project-btn-text">
                        Send Inquiry 
                        </div>
                    </div></a>
                </div>
            </div>
            <div class="project-side-container">
            <div class = "project-contractor-flip">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="flip-text-div">
                                <p><b>Delivery & Installation</b>(Contractor)</p>
                            </div>
                            <div class="flip-img-div">
                                <?php
                                    if (empty($data['contractor'])) {
                                        echo '<p> Not Assigned Yet </p>';
                                    } else { ?>
                                        <img class="flip-img" src="\ezolar\public\img\user-pics\<?php echo $data['contractor'][0]->profilePhoto ?>" alt="Avatar">
                                    <?php }
                                ?>
                            </div>
                        </div>
                        <div class="flip-card-back">
                            <?php if (empty($data['contractor'])) {
                                echo '<p> Not Assigned Yet </p>';
                            } else {
                                echo '<h2>'.$data['contractor'][0]->name.'</h2>
                                <p>'.$data['contractor'][0]->telno.'</p>
                                <p>'.$data['contractor'][0]->email.'</p>';
                            }?>
                        </div>
                    </div>
                </div>
                <div class = "project-payment-details-box">
                        <div class="acc-details-topic">
                            Account Details
                        </div>
                        <div class="details-wrapper">
                            <div class="details-box">
                                <div class="t">
                                    Account Number:
                                </div>
                                <div class="d">
                                    072-2-001-2-008235
                                </div>
                            </div>
                            <div class="details-box">
                                <div class="t">
                                    Benificiary Name:
                                </div>
                                <div class="d">
                                    Team eZolar
                                </div>
                            </div>
                            <div class="details-box">
                                <div class="t">
                                    Bank Name:
                                </div>
                                <div class="d">
                                    People's Bank
                                </div>
                            </div>
                            <div class="details-box">
                                <div class="t">
                                    Branch Name:
                                </div>
                                <div class="d">
                                    Ambalantota
                                </div>
                            </div>
                            <div class="details-box">
                                <div class="t">
                                    Purpose:
                                </div>
                                <div class="d">
                                    Delivery and Installation
                                </div>
                            </div>
                            <div class="details-box">
                                <div class="t">
                                    Amount:
                                </div>
                                <div class="d">
                                    Rs. 10000.00
                                </div>
                            </div>
                        </div>
                        
                    </div>

            </div>
        </div>
        
    </div>
</div>
<?php

if (($data['project'][0]->status) == "D0") {
    if (($data['deliverypayment'][0]->isVerified) == 1) { ?>
        <script>
             document.getElementById('make-payment-btn').style.display = "none";
        </script>
    <?php } 

    if (($data['deliverypayment'][0]->isVerified) == 0) { ?>
        <script>
            document.getElementById('make-payment-btn').style.display = "none";
        </script>
    <?php } 
     ?>
    <script>

        document.getElementById("request-received").style.color = "#DE8500";
        document.getElementById("request-received").style.fontWeight = "900";
        // document.getElementById("req-received").style.display =none;
    
        document.getElementById('add-schedule-btn').style.display = "none";
        


       
        document.getElementById('c4-link').removeAttribute("href");
        document.getElementById('c4-link').style.cursor = "default";
        document.getElementById('c5-link').removeAttribute("href");
        document.getElementById('c5-link').style.cursor = "default";


    </script>
<?php } elseif (($data['project'][0]->status) == "D1") {
     if ($data['dschedule'][0]->isConfirmed == 1) { ?>
         <script>
        document.getElementById("request-received").style.color = "#DE8500";
        document.getElementById("request-received").style.fontWeight = "900";
        document.getElementById("salesperson-assignment").style.color = "#DE8500";
        document.getElementById("salesperson-assignment").style.fontWeight = "900";

        document.getElementById('make-payment-btn').style.display = "none";
        document.getElementById('add-schedule-btn').style.display = "none";
        // document.getElementById("req-received").style.display =none;

       
        document.getElementById('c4-link').removeAttribute("href");
        document.getElementById('c4-link').style.cursor = "default";
        document.getElementById('c5-link').removeAttribute("href");
        document.getElementById('c5-link').style.cursor = "default";


    </script>
     <?php } else { ?>
        <script>
        document.getElementById("request-received").style.color = "#DE8500";
        document.getElementById("request-received").style.fontWeight = "900";
        document.getElementById("salesperson-assignment").style.color = "#DE8500";
        document.getElementById("salesperson-assignment").style.fontWeight = "900";

        document.getElementById('make-payment-btn').style.display = "none";
        // document.getElementById("req-received").style.display =none;

       
        document.getElementById('c4-link').removeAttribute("href");
        document.getElementById('c4-link').style.cursor = "default";
        document.getElementById('c5-link').removeAttribute("href");
        document.getElementById('c5-link').style.cursor = "default";


    </script>
    <?php } ?>
   
   


<?php } elseif (($data['project'][0]->status) == "E0") { ?>
    <script>
        document.getElementById("request-received").style.color = "#DE8500";
        document.getElementById("request-received").style.fontWeight = "900";
        document.getElementById("salesperson-assignment").style.color = "#DE8500";
        document.getElementById("salesperson-assignment").style.fontWeight = "900";
        document.getElementById("Contractor-assignment").style.color = "#DE8500";
        document.getElementById("Contractor-assignment").style.fontWeight = "900";

        document.getElementById('make-payment-btn').style.display = "none";
        document.getElementById('add-schedule-btn').style.display = "none";

        document.getElementById('pro-bar4').style.backgroundColor = "#DE8500";
        document.getElementById('circle-5').style.backgroundColor = "#DE8500";



    </script>

    

<?php

    } ?>
<div class = "f">
    <?php 
        $this->view('Includes/footer', $data);
    ?>
</div>
</body>
</html>