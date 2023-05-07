<?php
//  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
//  require_once(__ROOT__.'\app\views\Includes\header.php');
require_once(__ROOT__ . '\app\views\Customer\navbar.php');
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
    require_once(__ROOT__ . '\app\views\popupList\scheduleDatesUpdate.php');
    require_once(__ROOT__ . '\app\views\popupList\payment.php');
    require_once(__ROOT__ . '\app\views\popupList\packagepopup.php');

    // calling popup for date selection
    if (isset($_GET['add-schedule-btn'])) {
        // print_r("Shit");
        echo '
            <script>
                document.getElementById(' . "'id04'" . ').style.display=' . "'block'" . ';
            </script>
            
            ';
    }
    // calling popup for uploading payment reciept
    if (isset($_GET['view-pack-btn'])) {
        // print_r("Shit");
        echo '
            <script>
                document.getElementById(' . "'id05'" . ').style.display=' . "'block'" . ';

            </script>
            
            ';
    }
    if (isset($_GET['make-payment-btn'])) {
        // print_r("Shit");
        echo '
            <script>
                document.getElementById(' . "'id03'" . ').style.display=' . "'block'" . ';

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
                                    <div id="circle-3" class="project-progress-bar-bullet-highlighted" style="border: 3.5px solid #2C61A3"></div>
                                </a>
                                <div class="project-progress-bar-bullet-text">Inspection</div>
                            </div>
                            <div class="project-progress-bar-bullet-container">
                                <a id="c4-link"
                                    href="<?= URLROOT ?>/project/projectdetails/4?project_id=<?= $_GET['project_id'] ?>">
                                    <div id="circle-4" class="project-progress-bar-bullet"></div>
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
                        <div class="project-progress-bar" style="background-color: #DE8500;"></div>
                        <div class="project-progress-bar1" style="background-color: #DE8500;"></div>
                        <div class="project-progress-bar2" id="pro-bar3"></div>
                        <div class="project-progress-bar3" id="pro-bar4"></div>

                    </div>
                    <div class="project-details-inline">
                        <div class="project-details-steps-container">
                            <span id="request-received" class="project-details-steps-text">Awaiting Inspection</span>
                            <span class="project-details-steps-text-new">
                                <?php
                                    if (($data['schedule'][0]->isCompleted) == 0) {
                                        echo 'Please wait for the inspection';
                                    } else {
                                        echo ' Inspection completed';
                                    }
                                ?>
                            </span>
                            <span id="salesperson-assignment" class="project-details-steps-text">Package Confirmation</span>
                            <span class="project-details-steps-text-new">
                                <?php
                                    if (($data['project'][0]->Package_packageID) == NULL) {
                                        echo 'Engineer will confirm your package soon';
                                    } else {
                                        echo ' Click view package button below to view your solar package. ';
                                    }
                                ?>
                            </span>
                            
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
                            <b>Contractor ID:</b>
                            <?php
                            if (empty($data['contractor'])) {
                                echo 'Not Assigned ';
                            } else {
                                echo $data['contractor'][0]->name;
                            }

                            ?> <br>
                            <b>Scheduled Dates:</b>
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

                        </div>
                    </div>
                    <div class="project-details-btn-container" >
                        <div class="view-pack-btn" id="view-package" onclick="document.getElementById('id05').style.display='block'">
                            <div class="view-pack-btn-text">
                                View Package
                            </div>
                        </div>
                        <div class="cancel-order-btn" id="cancel-project">
                            <div class="cancel-order-btn-text">
                                <a href="<?=URLROOT?>/project/cancelProduct?project_id=<?=$_GET['project_id']?>">Cancel Project</a>
                            </div>
                        </div>
                        <div class="confirm-order-btn" id="confirm-order-btn"
                            onclick="document.getElementById('id03').style.display='block'">
                            <div class="confirm-order-btn-text">
                                Confirm Order
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
                    
                <div class = "project-engineer-flip">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="flip-text-div">
                                <p><b>Inspection</b>(Engineer)</p>
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
                                    Inspection payment
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

    if (($data['project'][0]->status) == "C0") { ?>
        <script>

            document.getElementById("request-received").style.color = "#DE8500";
            document.getElementById("request-received").style.fontWeight = "900";
            // document.getElementById("req-received").style.display =none;
            document.getElementById('view-package').style.display = "none";
            document.getElementById('cancel-project').style.display = "none";
            document.getElementById('confirm-order-btn').style.display = "none";


           
            document.getElementById('c4-link').removeAttribute("href");
            document.getElementById('c4-link').style.cursor = "default";
            document.getElementById('c5-link').removeAttribute("href");
            document.getElementById('c5-link').style.cursor = "default";


        </script>
    <?php } elseif (($data['project'][0]->status) == "C1") { ?>
        <script>
            document.getElementById("request-received").style.color = "#DE8500";
            document.getElementById("request-received").style.fontWeight = "900";
            document.getElementById("salesperson-assignment").style.color = "#DE8500";
            document.getElementById("salesperson-assignment").style.fontWeight = "900";
            // document.getElementById("req-received").style.display =none;

           
            document.getElementById('c4-link').removeAttribute("href");
            document.getElementById('c4-link').style.cursor = "default";
            document.getElementById('c5-link').removeAttribute("href");
            document.getElementById('c5-link').style.cursor = "default";


        </script>
       


    <?php } elseif (($data['project'][0]->status) == "C2") { ?>
        <script>
            document.getElementById("request-received").style.color = "#DE8500";
            document.getElementById("request-received").style.fontWeight = "900";
            document.getElementById("salesperson-assignment").style.color = "#DE8500";
            document.getElementById("salesperson-assignment").style.fontWeight = "900";
         
            // document.getElementById("req-received").style.display =none;


            document.getElementById('c4-link').removeAttribute("href");
            document.getElementById('c4-link').style.cursor = "default";
            document.getElementById('c5-link').removeAttribute("href");
            document.getElementById('c5-link').style.cursor = "default";



        </script>

    <?php

    } elseif (($data['project'][0]->status) == "F") { ?>
        <script>
            document.getElementById("request-received").style.color = "#DE8500";
            document.getElementById("request-received").style.fontWeight = "900";
            document.getElementById("salesperson-assignment").style.color = "#DE8500";
            document.getElementById("salesperson-assignment").style.fontWeight = "900";

            
         
            // document.getElementById("req-received").style.display =none;


            document.getElementById('c4-link').removeAttribute("href");
            document.getElementById('c4-link').style.cursor = "default";
            document.getElementById('c5-link').removeAttribute("href");
            document.getElementById('c5-link').style.cursor = "default";

            document.getElementById('cancel-project').style.display = "none";
            document.getElementById('confirm-order-btn').style.display = "none";
            document.getElementById('add-schedule-btn').style.display = "none";




        </script>

    <?php

    }
    else if (($data['project'][0]->status) == "D0" || ($data['project'][0]->status) == "D1" ) { ?>
        <script>
            document.getElementById("request-received").style.color = "#DE8500";
            document.getElementById("request-received").style.fontWeight = "900";
            document.getElementById("salesperson-assignment").style.color = "#DE8500";
            document.getElementById("salesperson-assignment").style.fontWeight = "900";

            // document.getElementById("req-received").style.display =none;

          
            document.getElementById('pro-bar3').style.backgroundColor = "#DE8500";
            document.getElementById('circle-4').style.backgroundColor = "#DE8500";

            document.getElementById('c5-link').removeAttribute("href");
            document.getElementById('c5-link').style.cursor = "default";

            document.getElementById('cancel-project').style.display = "none";
            document.getElementById('confirm-order-btn').style.display = "none";
            document.getElementById('add-schedule-btn').style.display = "none";



        </script>

<?php } elseif (($data['project'][0]->status) == "E0") { ?>
    <script>
        document.getElementById("request-received").style.color = "#DE8500";
        document.getElementById("request-received").style.fontWeight = "900";
        document.getElementById("salesperson-assignment").style.color = "#DE8500";
        document.getElementById("salesperson-assignment").style.fontWeight = "900";

        document.getElementById('pro-bar3').style.backgroundColor = "#DE8500";
        document.getElementById('circle-4').style.backgroundColor = "#DE8500";

        document.getElementById('pro-bar4').style.backgroundColor = "#DE8500";
        document.getElementById('circle-5').style.backgroundColor = "#DE8500";

        document.getElementById('cancel-project').style.display = "none";
        document.getElementById('confirm-order-btn').style.display = "none";
        document.getElementById('add-schedule-btn').style.display = "none";



    </script>

    

<?php

    } elseif (($data['project'][0]->status) == "Z0") { ?>
        <script>
            document.getElementById("request-received").style.color = "#DE8500";
            document.getElementById("request-received").style.fontWeight = "900";
            document.getElementById("salesperson-assignment").style.color = "#DE8500";
            document.getElementById("salesperson-assignment").style.fontWeight = "900";
    
            document.getElementById('pro-bar3').style.backgroundColor = "#DE8500";
            document.getElementById('circle-4').style.backgroundColor = "#DE8500";
    
            document.getElementById('pro-bar4').style.backgroundColor = "#DE8500";
            document.getElementById('circle-5').style.backgroundColor = "#DE8500";
    
            document.getElementById('cancel-project').style.display = "none";
            document.getElementById('confirm-order-btn').style.display = "none";
            document.getElementById('add-schedule-btn').style.display = "none";
    
    
    
        </script>
    <?php } ?>
    <div class="f">
        <?php
        $this->view('Includes/footer', $data);
        ?>
    </div>
</body>

</html>