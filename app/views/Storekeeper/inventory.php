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
    <link rel="stylesheet" href="\ezolar\public\css\storekeeper.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\products.css">
    <link rel="stylesheet" href="\ezolar\public\css\packages-advanced.css">
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.common.css">
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
            <div class="dashboard-common-main-topic" style="width:100%; justify-content: normal;">
                <div class="common-main-left-img">
                    <a href=”” “text-decoration: none”>
                        <img src="\ezolar\public\img\storekeeper\Inventory.png" alt="Products-icon">
                    </a>
                </div>
                <div class="common-main-txt">
                    Inventory
                </div>  
            </div>
            <div class="inventory-table-container">
                        <div class="form-table-header-container">
                            <span class="form-table-header-text inventory-col1"> Product Name</span>  <span class="form-table-header-text inventory-col2"> Manufacturer</span><span class="form-table-header-text inventory-col3"> Price per item</span> <span class="form-table-header-text inventory-col4"> Quantity</span>
                        </div>
                        <div class="inventory-table-body-container">
                                                    <?php
                            $results = $_SESSION['rows'];
                            $counter = 0;
                            foreach($results as $product){
                                if ($counter == 1){
                                    $styleClass = 'form-table-row-container-alt';
                                }else{
                                    $styleClass = 'form-table-row-container';
                                };
                                echo '<div class="'.$styleClass.'">
                                <span class="form-table-row-text inventory-col1">'.$product -> productName.'</span> 
                                <span class="form-table-row-text inventory-col2">'.$product -> manufacturer.'</span> 
                                <span class="form-table-row-text inventory-col3">'.$product -> cost.'</span> 
                                <span class="form-table-row-text inventory-col4">'.$product -> quantity.'</span>
                                </div>';
                                $counter = ($counter+1)%2;
                            }
                            ?>
                        </div>
                        
                    </div>
                    <div class="main-btn-container">
                    <a href="/ezolar/Inventory/addStocksPage"><button class="form-submit-btn">Add Stock</button></a>
                    <a href="/ezolar/Inventory/viewStocks"><button class="form-submit-btn">View Stock Entries</button></a>
                </div>
        </div>
    </div>
    <div class="f">
    <?php 
      $this->view('Includes/footer', $data);
    ?>
</div>
</body>
</html>