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
<div class="body-container">
    <?php
        require_once(__ROOT__.'\app\views\Customer\navigationpanel.php');
    ?>

    <div class="common-main-container">
        <div class="dashboard-common-main-topic">
            <div class="common-main-topic-left">
                <div class="common-main-left-img">

                        <img src="\ezolar\public\img\customer\projects.png" alt="project">
                </div>
                <div class="common-main-txt">
                    My Projects
                </div>
            </div>
           
        </div>
        <div class="project-type">
            <a class="sub-topic" href="/ezolar/project" style="color: #FFFFFF;"><div class = "project-sub-topic" style="background: #0B2F64; border: 3px solid #0B2F64;color: #FFFFFF; ">
            Ongoing Projects
            </div></a>
            <a class="sub-topic" href="/ezolar/project/completedProjects"><div class = "project-sub-topic">
            Completed Projects
            </div></a>
            <a class="sub-topic" href="/ezolar/project/cancelledProjects"><div class = "project-sub-topic">
            Cancelled Projects
            </div></a>

        </div>
        <div class="body-list-container">
            <!-- <div class="project-box">
                <div class="project-text-container">
                    <div class="project-text-container-inner">
                        <div class="project-text-no">project No. 123456</div>
                        <div class="project-text-name"><b>Pylon Tech Lithium Iron Battery 2.4 kWh</b></div>
                        <div class="project-text-price">Price: Rs. 30,000</div>
                    </div>
                    <div class="project-details-btn-container">
                        <div class="project-details-btn">
                            <div class="project-details-btn-text">More info</div>
                        </div>
                    </div>
                </div>  
            </div> -->

            <?php
            $results = $_SESSION['rows'];
            foreach($results as $row){
                echo '<div class="project-box">
                        <span class="project-text-container">
                            <div class="project-text-container-inner">
                                <div class="project-text-no">Project No: ' .  $row -> projectID . '</div>
                                <div class="project-text-name"><b>Status : ' . $row -> status . '</b></div>
                                <div class="project-text-no">Site Location: ' .  $row -> siteAddress . '</div>
                            </div>
                        </span>
                        <span class="project-details-btn-container">
                            <div class="project-details-btn">';

                            if (($row -> status) == 'B0' || ($row -> status) == 'B1') {
                               echo ' <span class="project-details-btn-text"><a href="' .URLROOT. '/project/projectdetails/2?project_id='.$row -> projectID.'" style = "color: #FFFFFF">More info</a></span> ';
                            }
                            else if (($row -> status) == 'C0' || ($row -> status) == 'C1'  ) {
                               echo ' <span class="project-details-btn-text"><a href="' .URLROOT. '/project/projectdetails/3?project_id='.$row -> projectID.'" style = "color: #FFFFFF">More info</a></span> ';
                            }

                            else if (($row -> status) == 'D0' || ($row -> status) == 'D1'  ) {
                                echo ' <span class="project-details-btn-text"><a href="' .URLROOT. '/project/projectdetails/4?project_id='.$row -> projectID.'" style = "color: #FFFFFF">More info</a></span> ';
                             }
                             else if (($row -> status) == 'E0' || ($row -> status) == 'E1'  ) {
                                echo ' <span class="project-details-btn-text"><a href="' .URLROOT. '/project/projectdetails/5?project_id='.$row -> projectID.'" style = "color: #FFFFFF">More info</a></span> ';
                             }
                            else {
                                echo '<span class="project-details-btn-text"><a href="' .URLROOT. '/project/projectdetails/1?project_id='.$row -> projectID.'" style = "color: #FFFFFF">More info</a></span>';
                            }

                            echo '
                            </div>
                        </span>
                        
                    </div>';
            }
            ?>
            
        </div>
        <div class="add-project-btn">
            <div class="add-project-btn-text">
              <a href="/ezolar/project/requestProjectPage"> New Project</a> 
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
