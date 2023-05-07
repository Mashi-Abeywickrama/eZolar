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
    <link rel="stylesheet" href="\ezolar\public\css\contractor.projects.css">
    <!-- <link rel="stylesheet" href="\ezolar\public\css\engineer.projects.css"> -->
    <title>My Projects</title>
</head>
<body>
<?php

    require_once(__ROOT__ . '\app\views\popupList\contractorPackage.php');
    require_once(__ROOT__ . '\app\views\popupList\accept.php');
    require_once(__ROOT__ . '\app\views\popupList\reject.php');
    // calling popup for VIEW package
    if (isset($_GET['pack'])) {
        // print_r("Shit");
        echo '
            <script>
                document.getElementById(' . "'id05'" . ').style.display=' . "'block'" . ';

            </script>
            
            ';
    }
    if (isset($_GET['btn-a'])) {
        echo '
            <script>
                document.getElementById(' . "'acc'" . ').style.display=' . "'block'" . ';

            </script>
            
            ';
    }
    if (isset($_GET['btn-r'])) {
        echo '
            <script>
                document.getElementById(' . "'reject'" . ').style.display=' . "'block'" . ';

            </script>
            
            ';
    }
?>
<div class="body-container">
    <?php
        require_once(__ROOT__.'\app\views\Contractor\navigationpanel.php');
    ?>
    <div class="common-main-container">
        <div class="dashboard-common-heading-container">
            <div class="dashboard-common-heading-back-btn">
                <a href="<?=URLROOT?>/user/profile" “text-decoration: none”>
                    <img src="\ezolar\public\img\admin\back.png">
                </a>
            </div>
            <div class="dashboard-common-heading-text">
                <b>Project ID: </b>
            </div>


        </div>
        <div class="project-details-container">
            <div class="project-details-inline-container">
                <div class="details-topic">
                            Site Details
                </div>
                <div class="details-wrapper">
                    <div class="details-box">
                        <div class="t">
                            Delivery Location:
                        </div>
                        <div class="d">
                            <?php echo $data['project'][0]->siteAddress?>
                        </div>
                    </div>
                    <div class="details-box">
                        <div class="t">
                            Delivery Date:
                        </div>
                        <div class="d">
                             <?php echo $data['schedule'][0]->date?>
                        </div>
                    </div>
                    <div class="details-box">
                        <div class="t">
                            Assigned Salesperson:
                        </div>
                        <div class="d">
                             <?php echo $data['salesperson'][0]->name?>
                        </div>
                    </div>
                    <div class="details-box">
                        <div class="t">
                            Assigned Engineer:
                        </div>
                        <div class="d">
                             <?php echo $data['engineer'][0]->name?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="project-details-customer-container">
                <div class="details-topic">
                    Customer Details
                </div>
                <div class="details-wrapper">
                    <div class="details-box">
                        <div class="t">
                            Customer Name:
                        </div>
                        <div class="d">
                            <?php echo $data['cus_details'][0]->name?>
                        </div>
                    </div>
                    <div class="details-box">
                        <div class="t">
                            Contact Number:
                        </div>
                        <div class="d">
                            <?php echo $data['cus_details'][0]->mobile?>
                        </div>
                    </div>
                    <div class="details-box">
                        <div class="t">
                            NIC Number:
                        </div>
                        <div class="d">
                            <?php echo $data['cus_details'][0]->nic?>
                        </div>
                    </div>
                </div>
            </div>

            <div id="pack" class="pack" onclick="document.getElementById('id05').style.display='block'">
                <div style="width:70%">View Package Details</div>
            </div>

        </div>

        <div class="buttons">
            <button class="btn-r" id="btn-r" onclick="document.getElementById('reject_action').action='../reject_project/<?php echo $data['schedule'][0]->scheduleID ?>/<?php echo $data['project'][0]->projectID ?>';document.getElementById('reject').style.display='block';">
                Reject
            </button>
            <button class="btn-a" id="btn-a" onclick="document.getElementById('accept_action').action='../accept_project/<?php echo $data['schedule'][0]->scheduleID ?>/<?php echo $data['project'][0]->projectID ?>';document.getElementById('acc').style.display='block'">
                Accept
            </button >
        </div> 

    </div>
        
</div>
</div>
    <div class="f">
        <?php
            require_once(__ROOT__.'\app\views\Includes\footer.php');
        ?>
    </div>
</body>
</html>