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
<div class="body-container">
    <?php
        require_once(__ROOT__.'\app\views\Customer\navigationpanel.php');
    ?>

    <div class="common-main-container">
        
            <div class="dashboard-common-heading-container">
                <div class="dashboard-common-heading-back-btn">
                    <a href="../"    “text-decoration: none”>
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
                                    <div id="circle-4" class="project-progress-bar-bullet-highlighted"></div>
                                </a>
                                <div class="project-progress-bar-bullet-text">Payment & Scheduling</div>
                            </div>
                            <div class="project-progress-bar-bullet-container">
                                <a id="c5-link"
                                    href="<?= URLROOT ?>/project/projectdetails/5?project_id=<?= $_GET['project_id'] ?>">
                                    <div id="circle-5" class="project-progress-bar-bullet-highlighted" style="border: 3.5px solid #2C61A3"></div>
                                </a>
                                <div class="project-progress-bar-bullet-text">Delivery & Installation</div>
                            </div>
                        </div>
                    <div class="project-progress-bar" style="background-color: #DE8500;"  id="pro-bar1"></div>
                    <div class="project-progress-bar1" style="background-color: #DE8500;"  id="pro-bar2"></div>
                    <div class="project-progress-bar2" style="background-color: #DE8500;"  id="pro-bar3"></div>
                    <div class="project-progress-bar3"  style="background-color: #DE8500;"   id="pro-bar4"></div>
                </div>
                <div class="project-details-inline">
                    <div class="project-details-steps-container">
                        <span class="project-details-steps-text-colored">Awaiting Installation</span>
                        <span class="project-details-steps-text-new">
                        <?php
                            if ($data['dschedule'][0]->isCompleted == 1) {
                                echo 'Project completion date: ' .$data['dschedule'][0]->date. '';
                            }
                        ?>
                        </span>
                        <span class="project-details-steps-text-new" id="extra">
                            Our contractor will contact you soon..
                        </span>
                        <?php if(($data['project'][0]->status) == "Z0"){?>
                            <script>
                                document.getElementById("extra").style.color = "green";
                                document.getElementById("extra").style.fontSize = "20px";
                                document.getElementById("extra").innerHTML = "Project Completed";
                            </script>
                        <?php }
                        ?>
                    </div>
                    <div class="project-details-info-container">
                        <b>Project No:</b> 123556 <br>
                        <b>Site Location:</b> 158, Puhulyaya Road, Ambalantota <br>
                        <b>Package:</b> Pending <br>
                        <b>Contractor:</b> Pending <br>
                        <b>Status:</b> Ongoing <br>
                        <b>Scheduled Dates:</b> None<br>
                    </div>
                </div>
                <div class="project-details-btn-container">
                    
                    <div class="add-project-btn">
                        <div class="add-project-btn-text">
                        <a href="/ezolar/project/requestProjectPage">Send Inquiry</a> 
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
<div class = "f">
    <?php 
        $this->view('Includes/footer', $data);
    ?>
</div>
</body>
</html>