<?php
    //  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
     require_once(__ROOT__.'\app\views\Includes\header.php');
     require_once(__ROOT__.'\app\views\Includes\navbar.php');
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

    <div class="left-panel">
        <a href="<?=URLROOT?>/user/dashboard"><div class ="box1">
            Customer Dashboard
        </div></a>
        <div class="rest">
            <div class="rest-top">
            <a href="<?=URLROOT?>/project"><div class="box2">
                    My Projects
                </div></a>
                <a href="<?=URLROOT?>/inquiry"><div class="box3">
                    Inquiries
                </div></a>
                <div class="box4">
                    Transactions
                </div>
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
            <div class="common-main-left-img">
                <a href=”#” “text-decoration: none”>
                    <img src="\ezolar\public\img\customer\projects.png" alt="project">
                </a>
            </div>
            <div class="common-main-txt">
                My Projects
            </div>
            
            <div class="common-main-right-img">
                <img src="\ezolar\public\img\profile.png" alt="profile">
            </div>   
        </div>
        <div class="project-list-container">
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
                            <div class="project-details-btn">
                                <span class="project-details-btn-text">More info</span>
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
</body>
<?php 
      $this->view('Includes/footer', $data);
?>
</html>
