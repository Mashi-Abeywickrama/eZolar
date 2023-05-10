<?php
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
    <link rel="stylesheet" href="\ezolar\public\css\storekeeper.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\products.css">
    <link rel="stylesheet" href="\ezolar\public\css\packages-advanced.css">
    <title>My Projects</title>
</head>
<body>
<div class="body-container"> 
    <div class="left-panel">
        <div class="sidebar-heading">
        <a class="sidebar-anchor" href="/ezolar/user/dashboard"><b>Storekeeper Dashboard</b></a>
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
                <a class="sidebar-anchor" href="/ezolar/Statistics/salesPerMonth"><div class="sidebar-link-container">
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
        <div class="dashboard-common-heading-container">
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
        <div class="inventory-table-container">
                    <div class="form-table-header-container">
                        <span class="form-table-header-text inventory-col1">Stock ID</span>  <span class="form-table-header-text inventory-col2">Arrival Date</span><span class="form-table-header-text inventory-col3">Type</span> <span class="form-table-header-text inventory-col4">Details</span>
                    </div>
                    <div class="inventory-table-body-container">
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
                            <span class="form-table-row-text inventory-col1"> Stock #'.$stock -> stockID .'</span> 
                            <span class="form-table-row-text inventory-col2">'.substr($stock -> arrivalDate,0,10).'</span> 
                            <span class="form-table-row-text inventory-col3">'.$stock -> stockType.'</span> 
                            <span class="form-table-row-text inventory-col4"><a href="/ezolar/Inventory/viewStockDetails/'.$stock -> stockID .'">Details</a></span>
                            </div>';
                            $counter = ($counter+1)%2;
                        }
                        ?>
                    </div>
                    
                </div>
                <div class="main-btn-container" style="justify-content:center;">
                <a href="/ezolar/Inventory/addStocksPage"><button class="form-submit-btn">Add Stock</button></a>
            </div>
    </div>
    </div>
</div>
<div class="f">
    <?php 
      $this->view('Includes/footer', $data);
    ?>
</body>
</html>