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
                <a href="<?=URLROOT?>/project/troubleshoot" “text-decoration: none”>
                    <img src="\ezolar\public\img\admin\back.png" style="margin-left: 1rem;">
                </a>
                </div>
                <div class="common-main-txt">
                    Troubleshoot Details
                </div>
            </div>
           
        </div>
        <div class="Trouble-details-container">
            <div class="project-details-inline-container">
                <div class="details-topic">
                            Site Details
                </div>
                <div class="t-details-wrapper">
                    <div class="details-box">
                        <div class="t">
                            Project ID:
                        </div>
                        <div class="d">
                            <?php echo $data['rows'][0]->Project_projectID ?>
                        </div>
                    </div>
                    <div class="details-box">
                        <div class="t">
                            Project requested date:
                        </div>
                        <div class="d">
                        <?php echo $data['rows'][0]-> requestDate ?>
                        </div>
                    </div>
                    <div class="details-box">
                        <div class="t">
                            Troubleshoot date:
                        </div>
                        <div class="d">
                        <?php echo $data['rows'][0]-> date ?>
                        </div>
                    </div>
                    <div class="details-box">
                        <div class="t">
                            Assigned Salesperson:
                        </div>
                        <div class="d">
                        <?php echo $data['salesperson'][0]->name ?>
                        </div>
                    </div>
                    <div class="details-box">
                        <div class="t">
                            Assigned Engineer:
                        </div>
                        <div class="d">
                        <?php echo $data['engineer'][0]->name ?>
                        </div>
                    </div>
                    <div class="details-box">
                        <div class="t">
                             
                        </div>
                        <div class="d">
                        <?php
                                if($data['rows'][0] -> isCompleted == 0){
                                    echo '<div class="project-text-name" style = "color:#DE8500"><b>Status : Not completed</b></div>';
                                }else{
                                    echo '<div class="project-text-name" style = "color:#00A600"><b>Status : Completed</b></div>';
                                }
                            ?>
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
