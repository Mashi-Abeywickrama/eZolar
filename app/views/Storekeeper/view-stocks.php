<?php
    //  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__.'/app/views/Includes/header.php');
     require_once(__ROOT__.'/app/views/Includes/navbar.php');
     require_once(__ROOT__.'/app/views/Includes/footer.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <link rel="stylesheet" href="\ezolar\public\css\storekeeper.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\products.css">
    <link rel="stylesheet" href="\ezolar\public\css\packages-advanced.css">
    <title>My Projects</title>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-heading">
            <b>Storekeeper Dashboard</b>
        </div>
        <div class="sidebar-link-container-group">
            <div class="sidebar-link-container-top">
                <a class="sidebar-anchor" href="/ezolar/Inventory"><div class="sidebar-link-container-selected">
                    Inventory
                </div></a>
                <a class="sidebar-anchor" href="/ezolar/Product"><div class="sidebar-link-container">
                    Products
                </div></a>
                <a class="sidebar-anchor" href="/ezolar/Package"><div class="sidebar-link-container">
                    Packages
                </div></a>
                <a class="sidebar-anchor" href=""><div class="sidebar-link-container">
                    Reports & Stats
                </div></a>
            </div>

            <div class="sidebar-link-container-bottom">
                <a class="sidebar-anchor" href="/ezolar/User/profile"><div class="sidebar-link-container">
                    Profile
                </div></a>
                <a class="sidebar-anchor" href=""><div class="sidebar-link-container">
                    Settings
                </div></a>
            </div>
        </div>
    </div>
    <div class="common-main-container">
        <div class="dashboard-common-heading-container" style="width:80%;">
            <div class="dashboard-common-heading-back-btn">
                <a href="/ezolar/Inventory" “text-decoration: none”>
                    <img src="\ezolar\public\img\storekeeper\Back.png">
                </a>
            </div>
            <div class="dashboard-common-heading-text">
                <b>View Stock Entries</b>
            </div>
            <div class="dashboard-common-heading-image">
                <a href=”” “text-decoration: none”>
                    <img src="\ezolar\public\img\storekeeper\Products.png" alt="Products-icon">
                </a>
            </div>
        </div>  
        <div class="form-table-container">
                    <div class="form-table-header-container">
                        <span class="form-table-header-text">Stock ID</span>  <span class="form-table-header-text">Arrival Date</span><span class="form-table-header-text">Type</span> <span class="form-table-header-text">Details</span>
                    </div>
                    <div class="form-table-body-container">
                                                <?php
                        $results = $_SESSION['rows'];
                        $counter = 0;
                        foreach($results as $stock){
                            if ($counter == 1){
                                $styleClass = 'form-table-row-container-alt';
                            }else{
                                $styleClass = 'form-table-row-container';
                            };
                            echo '<div class="'.$styleClass.'">
                            <span class="form-table-row-text"> Stock #'.$stock -> stockID .'</span> 
                            <span class="form-table-row-text">'.$stock -> arrivalDate.'</span> 
                            <span class="form-table-row-text">'.$stock -> stockType.'</span> 
                            <span class="form-table-row-text"><a href="">Details</a></span>
                            </div>';
                            $counter = ($counter+1)%2;
                        }
                        ?>
                    </div>
                    
                </div>
                <div class="form-button-container" style="justify-content:center;">
                <a href=""><button class="form-submit-btn">Add Stock</button></a>
            </div>
    </div>
</body>
</html>