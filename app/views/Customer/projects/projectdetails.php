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
    <link rel="stylesheet" href="\ezolar\public\css\customer.project.css">
    <title>My Projects</title>
</head>
<body>


    <?php
        require_once(__ROOT__.'\app\views\popupList\scheduleDates.php');
        require_once(__ROOT__.'\app\views\popupList\payment.php');

            // calling popup for date selection
        if (isset($_GET['add-schedule-btn'])) {
            print_r("Shit");
            echo '
            <script>
                document.getElementById('."'id04'".').style.display='."'block'".';
            </script>
            
            ';
        }
            // calling popup for uploading payment reciept
        if (isset($_GET['make-payment-btn'])) {
            print_r("Shit");
            echo '
            <script>
                document.getElementById('."'id03'".').style.display='."'block'".';

            </script>
            
            ';
        }
        
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
                        <div class="project-progress-bar-bullet-container" >
                        <a id="c1-link" href="<?=URLROOT?>/project/projectdetails/1?project_id=<?=$_GET['project_id']?>"><div id="circle-1" class="project-progress-bar-bullet-highlighted" style="border: 3.5px solid #2C61A3"></div></a>
                            <div class="project-progress-bar-bullet-text" >Request</div>
                        </div>
                        <div class="project-progress-bar-bullet-container">
                        <a id="c2-link" href="<?=URLROOT?>/project/projectdetails/2?project_id=<?=$_GET['project_id']?>"><div id="circle-2"  class="project-progress-bar-bullet"></div></a>
                            <div class="project-progress-bar-bullet-text">Inspection Scheduling</div>
                        </div>
                        <div class="project-progress-bar-bullet-container">
                        <a id="c3-link" href="<?=URLROOT?>/project/projectdetails/3?project_id=<?=$_GET['project_id']?>"><div id="circle-3" class="project-progress-bar-bullet" ></div></a>
                            <div class="project-progress-bar-bullet-text">Inspection</div>
                        </div>
                        <div class="project-progress-bar-bullet-container">
                        <a id="c4-link" href="<?=URLROOT?>/project/projectdetails/4?project_id=<?=$_GET['project_id']?>"><div id="circle-4"  class="project-progress-bar-bullet"></div></a>
                            <div class="project-progress-bar-bullet-text">Payment & Scheduling</div>
                        </div>
                        <div class="project-progress-bar-bullet-container">
                            <a id="c5-link" href="<?=URLROOT?>/project/projectdetails/5?project_id=<?=$_GET['project_id']?>"><div id="circle-5"  class="project-progress-bar-bullet"></div></a>
                            <div class="project-progress-bar-bullet-text">Delivery & Installation</div>
                        </div>
                    </div>
                    <div class="project-progress-bar" id="pro-bar1"></div>
                    <div class="project-progress-bar1" id="pro-bar2"></div>
                    <div class="project-progress-bar2" id="pro-bar3"></div>
                    <div class="project-progress-bar3" id="pro-bar4"></div>
                    
                </div>
                <div class="project-details-inline">
                    <div class="project-details-steps-container">
                    <span id="request-received" class="project-details-steps-text">Request Received</span>
                        <span id="salesperson-assignment" class="project-details-steps-text">Salesperson Assignment</span>
                        <span id="payment-verify" class="project-details-steps-text">Payment Verification
                        <span class="project-details-steps-text" >
                            <?php
                            if (($data['project'][0]->status) == "A2") {
                                if (($data['inspectionpayment'][0]->isVerified) == 0) {
                                    echo 'Payment Verification Is Still In Progress';
                                }
                                if (($data['inspectionpayment'][0]->isVerified) == 1) {
                                    echo 'Payment Verified Successfully. Schedule The Dates Now';
                                }
                                if (($data['inspectionpayment'][0]->isVerified) == 2) {
                                    echo 'Payment Rejected. Upload The Receipt Again';
                                }
                            } else {
                               echo '';
                            }
                            
                            ?>
                        </span>

                        </span>
                    </div>
                    <div class="project-details-info-container">
                        <b>Project No:</b> <?php echo $data['project'][0]->projectID ?> <br>
                        <b>Site Location:</b> <?php echo $data['project'][0]->siteAddress ?> <br>
                        <b>Package:</b><?php
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
                        <b>Contractor ID:</b> 
                        <?php
                        if (empty($data['contractor'])) {
                            echo 'Not Assigned ';
                        } else {
                            echo $data['contractor'][0]->name;
                        }
                        
                        ?>  <br>
                       
                    </div>
                </div>
                <div  class="project-details-btn-container">
                    <div class="make-payment-btn" id="make-payment-btn" onclick="document.getElementById('id03').style.display='block'">
                        <div  class="make-payment-btn-text">
                        Upload Receipt 
                        </div>
                    </div>
                    <div class="add-schedule-btn" name="add-schedule-btn" id= "add-schedule-btn" onclick="document.getElementById('id04').style.display='block'">
                        <div class="add-schedule-btn-text">
                        Schedule 
                        </div>
                    </div>
                    <div class="make-inquiry-btn">
                        <div class="make-inquiry-btn-text">
                        <a href="/ezolar/project/">Send Inquiry</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="project-side-container">
                <div class = "project-salesperson-flip">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="flip-text-div">
                                <p><b>Salesperson</b></p>
                            </div>
                            <div class="flip-img-div">
                                <?php
                                    if (empty($data['salesperson'])) {
                                        echo '<p> Not Assigned Yet </p>';
                                    } else { ?>
                                        <img class="flip-img" src="\ezolar\public\img\user-pics\<?php echo $data['salesperson'][0]->profilePhoto ?>" alt="Avatar">
                                    <?php }
                                ?>
                            </div>
                        </div>
                        <div class="flip-card-back">
                        <?php if (empty($data['salesperson'])) {
                            echo '<p> Not Assigned Yet </p>';
                        } else {
                            echo '<h2>'.$data['salesperson'][0]->name.'</h2>
                            <p>'.$data['salesperson'][0]->telno.'</p>
                            <p>'.$data['salesperson'][0]->email.'</p>';
                        }?>
                            
                        </div>
                    </div>
                </div>
                <div class = "project-engineer-flip">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="flip-text-div">
                                <p><b>Engineer</b></p>
                            </div>
                            <div class="flip-img-div">
                                <?php
                                    if (empty($data['engineer'])) {
                                        echo '<p> Not Assigned Yet </p>';
                                    } else { ?>
                                        <img class="flip-img" src="\ezolar\public\img\user-pics\<?php echo $data['engineer'][0]->profilePhoto ?>" alt="Avatar">
                                    <?php }
                                ?>
                            </div>
                        </div>
                        <div class="flip-card-back">
                            <?php if (empty($data['engineer'])) {
                                echo '<p> Not Assigned Yet </p>';
                            } else {
                                echo '<h2>'.$data['engineer'][0]->name.'</h2>
                                <p>'.$data['engineer'][0]->telno.'</p>
                                <p>'.$data['engineer'][0]->email.'</p>';
                            }?>
                        </div>
                    </div>
                </div>
                <div class = "project-contractor-flip">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="flip-text-div">
                                <p><b>Contractor</b></p>
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

            </div>
        </div>
        
    </div>
</div>
<?php 

    if (($data['project'][0]->status) == "A0") { ?>
        <script>

            document.getElementById("request-received").style.color = "#DE8500";
            document.getElementById("request-received").style.fontWeight = "900";
            // document.getElementById("req-received").style.display =none;
            document.getElementById('make-payment-btn').style.display = "none";
            document.getElementById('add-schedule-btn').style.display = "none";

            document.getElementById('c2-link').removeAttribute("href"); 
            document.getElementById('c2-link').style.cursor="default";
            document.getElementById('c3-link').removeAttribute("href"); 
            document.getElementById('c3-link').style.cursor="default";
            document.getElementById('c4-link').removeAttribute("href"); 
            document.getElementById('c4-link').style.cursor="default";
            document.getElementById('c5-link').removeAttribute("href"); 
            document.getElementById('c5-link').style.cursor="default";  


        </script>
    <?php } elseif (($data['project'][0]->status) == "A1") { ?>
        <script>
            document.getElementById("request-received").style.color = "#DE8500";
            document.getElementById("request-received").style.fontWeight = "900";
            document.getElementById("salesperson-assignment").style.color = "#DE8500";
            document.getElementById("salesperson-assignment").style.fontWeight = "900";
            // document.getElementById("req-received").style.display =none;
            document.getElementById('make-payment-btn').style.display = "none";
            document.getElementById('add-schedule-btn').style.display = "none";

            document.getElementById('c2-link').removeAttribute("href"); 
            document.getElementById('c2-link').style.cursor="default";
            document.getElementById('c3-link').removeAttribute("href"); 
            document.getElementById('c3-link').style.cursor="default";
            document.getElementById('c4-link').removeAttribute("href"); 
            document.getElementById('c4-link').style.cursor="default";
            document.getElementById('c5-link').removeAttribute("href"); 
            document.getElementById('c5-link').style.cursor="default"; 


        </script>
        
    <?php } elseif (($data['project'][0]->status) == "A2") { ?>
        <script>
            document.getElementById("request-received").style.color = "#DE8500";
            document.getElementById("request-received").style.fontWeight = "900";
            document.getElementById("salesperson-assignment").style.color = "#DE8500";
            document.getElementById("salesperson-assignment").style.fontWeight = "900";
            document.getElementById("payment-verify").style.color = "#DE8500";
            document.getElementById("payment-verify").style.fontWeight = "900";
            // document.getElementById("req-received").style.display =none;

            document.getElementById('c2-link').removeAttribute("href"); 
            document.getElementById('c2-link').style.cursor="default";
            document.getElementById('c3-link').removeAttribute("href"); 
            document.getElementById('c3-link').style.cursor="default";
            document.getElementById('c4-link').removeAttribute("href"); 
            document.getElementById('c4-link').style.cursor="default";
            document.getElementById('c5-link').removeAttribute("href"); 
            document.getElementById('c5-link').style.cursor="default"; 
            


        </script>
        
    <?php if (($data['inspectionpayment'][0]->isVerified) == 0) { ?>
        <script>
            document.getElementById('make-payment-btn').style.display = "none";
            document.getElementById('add-schedule-btn').style.display = "none";
        </script>
    <?php } 
    if (($data['inspectionpayment'][0]->isVerified) == 1) { ?>
        <script>
             document.getElementById('make-payment-btn').style.display = "none";
        </script>
    <?php } 
    if (($data['inspectionpayment'][0]->isVerified) == 2) { ?>
        <script>
            document.getElementById('add-schedule-btn').style.display = "none";
        </script>
    <?php } 

} elseif (($data['project'][0]->status) == "B0" || ($data['project'][0]->status) == "B1" ) { ?>
         <script>
            document.getElementById("request-received").style.color = "#DE8500";
            document.getElementById("request-received").style.fontWeight = "900";
            document.getElementById("salesperson-assignment").style.color = "#DE8500";
            document.getElementById("salesperson-assignment").style.fontWeight = "900";
            document.getElementById("payment-verify").style.color = "#DE8500";
            document.getElementById("payment-verify").style.fontWeight = "900";
            // document.getElementById("req-received").style.display =none;
            document.getElementById('make-payment-btn').style.display = "none";
            document.getElementById('add-schedule-btn').style.display = "none";

            document.getElementById('pro-bar1').style.backgroundColor = "#DE8500";
            document.getElementById('circle-2').style.backgroundColor = "#DE8500";


            


        </script>

<?php } ?>
<?php
if (($data['project'][0]->status) == "C0" || ($data['project'][0]->status) == "C1" || ($data['project'][0]->status) == "C2"  || ($data['project'][0]->status) == "F") { ?>
         <script>
            document.getElementById("request-received").style.color = "#DE8500";
            document.getElementById("request-received").style.fontWeight = "900";
            document.getElementById("salesperson-assignment").style.color = "#DE8500";
            document.getElementById("salesperson-assignment").style.fontWeight = "900";
            document.getElementById("payment-verify").style.color = "#DE8500";
            document.getElementById("payment-verify").style.fontWeight = "900";
            // document.getElementById("req-received").style.display =none;
            document.getElementById('add-schedule-btn').style.display = "none";
            document.getElementById('make-payment-btn').style.display = "none";

            document.getElementById('pro-bar1').style.backgroundColor = "#DE8500";
            document.getElementById('circle-2').style.backgroundColor = "#DE8500";

            document.getElementById('pro-bar2').style.backgroundColor = "#DE8500";
            document.getElementById('circle-3').style.backgroundColor = "#DE8500";

            document.getElementById('c4-link').removeAttribute("href"); 
            document.getElementById('c4-link').style.cursor="default";
            document.getElementById('c5-link').removeAttribute("href"); 
            document.getElementById('c5-link').style.cursor="default";

            


        </script>

<?php } 
if (($data['project'][0]->status) == "E0" ) { ?>
    <script>
       document.getElementById("request-received").style.color = "#DE8500";
       document.getElementById("request-received").style.fontWeight = "900";
       document.getElementById("salesperson-assignment").style.color = "#DE8500";
       document.getElementById("salesperson-assignment").style.fontWeight = "900";
       document.getElementById("payment-verify").style.color = "#DE8500";
       document.getElementById("payment-verify").style.fontWeight = "900";
       // document.getElementById("req-received").style.display =none;
       document.getElementById('add-schedule-btn').style.display = "none";
       document.getElementById('make-payment-btn').style.display = "none";

       document.getElementById('pro-bar1').style.backgroundColor = "#DE8500";
       document.getElementById('circle-2').style.backgroundColor = "#DE8500";

       document.getElementById('pro-bar2').style.backgroundColor = "#DE8500";
       document.getElementById('circle-3').style.backgroundColor = "#DE8500";

       document.getElementById('pro-bar3').style.backgroundColor = "#DE8500";
       document.getElementById('circle-4').style.backgroundColor = "#DE8500";

       document.getElementById('pro-bar4').style.backgroundColor = "#DE8500";
       document.getElementById('circle-5').style.backgroundColor = "#DE8500";

 

       


   </script>

<?php } ?>

<?php
if (($data['project'][0]->status) == "D0" || ($data['project'][0]->status) == "D1") { ?>
         <script>
            document.getElementById("request-received").style.color = "#DE8500";
            document.getElementById("request-received").style.fontWeight = "900";
            document.getElementById("salesperson-assignment").style.color = "#DE8500";
            document.getElementById("salesperson-assignment").style.fontWeight = "900";
            document.getElementById("payment-verify").style.color = "#DE8500";
            document.getElementById("payment-verify").style.fontWeight = "900";
            // document.getElementById("req-received").style.display =none;
            document.getElementById('add-schedule-btn').style.display = "none";
            document.getElementById('make-payment-btn').style.display = "none";

            document.getElementById('pro-bar1').style.backgroundColor = "#DE8500";
            document.getElementById('circle-2').style.backgroundColor = "#DE8500";

            document.getElementById('pro-bar2').style.backgroundColor = "#DE8500";
            document.getElementById('circle-3').style.backgroundColor = "#DE8500";

            document.getElementById('pro-bar3').style.backgroundColor = "#DE8500";
            document.getElementById('circle-4').style.backgroundColor = "#DE8500";

            
            document.getElementById('c5-link').removeAttribute("href"); 
            document.getElementById('c5-link').style.cursor="default";

            


        </script>

<?php } ?>


<div class = "f">
    <?php 
        $this->view('Includes/footer', $data);
    ?>
</div>
</body>
</html>