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
    <link rel="stylesheet" href="\ezolar\public\css\engineer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\engineer-reports.css">
    <title>My Projects</title>
</head>
<body>
<div class="body-container">
    <div class="left-panel">
        <div class="sidebar-heading">
        <a class="sidebar-anchor" href="/ezolar/user/dashboard"><b>Engineer Dashboard</b></a>
        </div>
        <div class="sidebar-link-container-group">
            <div class="sidebar-link-container-top">
                <a class="sidebar-anchor" href="/ezolar/EngineerProject"><div class="sidebar-link-container">
                    Assigned Projects
                </div></a>
                <a class="sidebar-anchor" href="/ezolar/EngineerSchedule"><div class="sidebar-link-container">
                    My Schedule
                </div></a>
                <a class="sidebar-anchor" href="/ezolar/EngineerIssue"><div class="sidebar-link-container">
                    Report an Issue
                </div></a>
                <a class="sidebar-anchor" href="/ezolar/EngineerReport"><div class="sidebar-link-container-selected">
                    My Performace Report
                </div></a>
            </div>

            <a class="sidebar-anchor" href="/ezolar/User/profile"><div class="sidebar-link-container-bottom">
                <div class="sidebar-link-container">
                    Profile
                </div></a>
            <a class="sidebar-anchor" href=""><div class="sidebar-link-container">
                    Settings
                </div></a>
            </div>
        </div>
    </div>
    <div class="common-main-container">
        <div class="dashboard-common-main-topic">
            <div class="common-main-left-img">
                <a href=”” “text-decoration: none”>
                    <img src="\ezolar\public\img\engineer\Projects.png" alt="projects-icon">
                </a>
            </div>
            <div class="common-main-txt">
                Engineer Reports
            </div>
            </div>
            <div class="report-container">
                <div class="report-inline">
                    <div class="eng-report-inspections-section">
                        <div class="report-title-text"> Inspections Statistics </div>
                        <div class="report-line"><span class="left">Number of Inspections this week : </span><span class="right"><?php echo $_SESSION['inspection']['current'];?></span></div>
                        <div class="report-line"><span class="left">Number of Inspections last week : </span><span class="right"><?php echo $_SESSION['inspection']['last'];?></span></div>
                        <div class="report-line"><span class="left">Change Percentage : </span><span class="right"><?php echo $_SESSION['inspection']['change'];?></span></div>
                        <div class="report-line" style="margin-top:40px;"><span class="left">Company Average of the Week: </span><span class="right"><?php echo $_SESSION['inspection']['average'];?></span></div>
                    </div>
                    <div class="eng-report-package-section">
                        <div class="report-title-text"> Package Price Statistics </div>
                        <div class="report-line">Package Prices of your projects:</div>
                        <div class="project-total-list">
                        <?php 
                        $subtotal = 0;
                        if (count($_SESSION['package'])<=0){
                            echo '<div class="no-package-text">No packages were confirmed this week</div>';
                        } else {
                            foreach($_SESSION['package'] as $project){
                                echo '<div class="report-line"><span class="left">From '.strtoupper($project['projectID']).' :</span>'.'<span class="right">Rs. '.number_format($project['total'],0,'.',',').'/= </span></div>';
                                $subtotal += $project['total'];
                            }
                        }

                        echo '</div><div class="report-line" style="font-weight:bold;"><span class="left">Total : </span>'.'<span class="right">Rs. '.number_format($subtotal,0,'.',',').'/=</span></div>';
                        ?>
                        

                    </div>
                </div>
                <div class="eng-report-project-section">
                <div class="report-title-text"> Confirmed Packages Information </div>
                    <?php
                    if (count($_SESSION['package'])<=0){
                        echo '<div class="no-package-text">No packages were confirmed this week</div>';
                    } else {
                        foreach($_SESSION['project'] as $modpack){
                            echo '<div class="modpack-title-container" id="card-'.$modpack['projectID'].'"><span class="modpack-title-text">From Project : '.strtoupper($modpack['projectID']).'</span><img src="\ezolar\public\img\engineer\Forward.png" class="modpack-title-btn" id="btn-'.$modpack['projectID'].'"></div>';
                            $total = 0;
                            echo '<div class="modpack-content-container" id=content-'.$modpack['projectID'].'><div class="report-line mid">Package you recommended :</div><div class="">';
                            foreach($modpack['products'] as $product){
                                echo '<div class="report-line small"><span class="left">'.$product->productName.' X '.$product->productQuantity.'</span><span class="right">Rs. '.number_format($product->productQuantity*$product->cost,0,'.',',').'/=</span></div>';
                                $total += $product->productQuantity*$product->cost;
                            }
                            echo '</div>';
                            foreach($modpack['extras'] as $extra){
                                echo '<div class="report-line small"><span class="left">'.$extra->description.'</span><span class="right">Rs. '.number_format($extra->price,0,'.',',').'/=</span></div>';
                                $total += $extra->price;
                            }
                            echo '<div class="report-line mid"><span class="left">Total</span><span class="right">Rs. '.number_format($total,0,'.',',').'/=</span></div></div>';  
                            echo '
                                <script>
                                    var card_'.$modpack['projectID'].' = document.getElementById("card-'.$modpack['projectID'].'");
                                    var btn_'.$modpack['projectID'].' = document.getElementById("btn-'.$modpack['projectID'].'");
                                    var content_'.$modpack['projectID'].' = document.getElementById("content-'.$modpack['projectID'].'");

                                    card_'.$modpack['projectID'].'.addEventListener(\'click\', function(card){
                                        content_'.$modpack['projectID'].'.classList.toggle(\'expanded\');
                                        btn_'.$modpack['projectID'].'.classList.toggle(\'expanded\');
                                    });
                                </script>
                            ';
                        }
                    }
                    ?>
                </div>
            </div>
            
        
        
    </div>  
</div>
<div class="f">
    <?php 
      $this->view('Includes/footer', $data);
      unset($_SESSION['inspection'],$_SESSION['package'],$_SESSION['project']);
    ?>
</div>
</body>
</html>