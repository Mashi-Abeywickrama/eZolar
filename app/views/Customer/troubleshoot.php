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
    <link rel="stylesheet" href="\ezolar\public\css\customer.troubleshoot.css">
    <!-- <link rel="stylesheet" href="\ezolar\public\css\customer.project.css"> -->
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
                    <a href=”#” “text-decoration: none”>
                        <img src="\ezolar\public\img\customer\projects.png" alt="project">
                    </a>
                </div>
                <div class="common-main-txt">
                    Trouble Shooting
                </div>
            </div>
           
        </div>
        <div class="body-list-container">
            <?php
            if (count($data['rows'])<=0){
                echo '<div class="no-projects-text">No troubleshoot requests to show</div>';
            }else{ 
            foreach ($data['rows'] as $row){
                echo '<div class="project-box">
                        <span class="project-text-container">
                            <div class="project-text-container-inner">
                                <div class="project-text-no">Project No: ' .  $row -> Project_projectID . '</div>
                                ';?>
                                    <?php
                                        if($row -> isCompleted == 0){
                                            echo '<div class="project-text-name" style = "color:#DE8500"><b>Status : Not completed</b></div>';
                                        }else{
                                            echo '<div class="project-text-name" style = "color:#00A600"><b>Status : Completed</b></div>';
                                        }
                                    ?>
                                <?php echo'<div class="project-text-no">Inspection Date: ' .  $row -> date . '</div>
                            </div>
                        </span>
                        <span class="project-details-btn-container1">
                            <div class="project-details-btn">
                                <span class="project-details-btn-text"><a href="' .URLROOT. '/project/troubleshootdetails/'.$row -> projectID.'" style = "color: #FFFFFF">More info</a></span>
                            </div>
                        </span>
                        
                    </div>';
            }}
            ?>
            
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
