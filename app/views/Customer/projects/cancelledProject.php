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
    <div class="left-panel">
        <a href="<?=URLROOT?>/user/dashboard"><div class ="box1">
            Customer Dashboard
        </div></a>
        <div class="rest">
            <div class="rest-top">
            <a href="<?=URLROOT?>#"><div class="box7">
                    Packages
                </div></a>
            <a href="<?=URLROOT?>/project"><div class="box2">
                    My Projects
                </div></a>
                <a href="<?=URLROOT?>/inquiry"><div class="box3">
                    Inquiries
                </div></a>
                <a href="<?=URLROOT?>/transaction"><div class="box4">
                    Transactions
                </div></a>
            </div>
            <div class="rest-bottom">
            <a href="<?=URLROOT?>/user/profile"><div class="box5">
                    Profile
                </div></a>
                <a href="<?=URLROOT?>/customersettings"><div class="box6">
                    Settings
                </div></a>
            </div>
        </div>
    </div>

    <div class="common-main-container">
        <div class="dashboard-common-main-topic">
            <div class="common-main-topic-left">
                <div class="common-main-left-img">
                    <a href=”#” “text-decoration: none”>
                        <img src="\ezolar\public\img\customer\projects.png" alt="project">
                    </a>
                </div>
                <div class="common-main-txt">
                    My Projects
                </div>
            </div>
           
        </div>
        <div class="project-type">
            <div class = "project-sub-topic">
            <a href="/ezolar/project">Ongoing Projects</a>
            </div>
            <div class = "project-sub-topic">
            <a href="/ezolar/project/completedProjects">Completed Projects</a>
            </div>
            <div class = "project-sub-topic" style="background: #ad1515; border: 3px solid #0B2F64;">
            <a href="/ezolar/project/cancelledProjects" >Cancelled Projects</a>
            </div>

        </div>
        <div class="body-list-container">
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
                            <div class="project-details-btn">
                                <span class="project-details-btn-text"><a href="' .URLROOT. '/project/projectdetails" style = "color: #FFFFFF">More info</a></span>
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
<script>
    const boxes = document.querySelectorAll('.project-sub-topic');

    for (let i = 0; i < boxes.length; i++) {
        boxes[i].addEventListener('click', function() {
          // remove border from all boxes
            for (let j = 0; j < boxes.length; j++) {
              boxes[j].classList.remove('selected');
            } 
            // add border to clicked box
            this.classList.add('selected');
        });
    }

</script>

</html>
