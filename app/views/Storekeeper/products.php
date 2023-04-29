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
                <a class="sidebar-anchor" href="/ezolar/Inventory"><div class="sidebar-link-container">
                    Inventory
                </div></a>
                <a class="sidebar-anchor" href="/ezolar/Product"><div class="sidebar-link-container-selected">
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
        <div class="dashboard-common-main-topic">
            <div class="common-main-left-img">
                <a href=”” “text-decoration: none”>
                    <img src="\ezolar\public\img\storekeeper\Products.png" alt="Products-icon">
                </a>
            </div>
            <div class="common-main-txt">
                Products
            </div>  
        </div>
        <div class="product-list-container">
            <?php
            $results = $_SESSION['rows'];
            foreach($results as $row){
                echo '<div class="product-card">
                <div class="product-image-container">

                </div>
                <div class="product-text-container">
                    <div class="product-text-container-inner">
                    <div class="product-text-no">Product No.' .$row -> productID.'</div>
                    <div class="product-text-name"><b>'.$row -> productName.'</b></div>
                    <div class="product-text-price">Price: Rs.' .$row -> cost.'</div>
                    </div>
                </div>
                <div class="product-details-btn-container">
                    <a href="/ezolar/Product/productDetailspage/'.$row -> productID.'"><div class="product-details-btn">
                        <div class="product-details-btn-text">More info</div>
                    </div></a>
                </div>
            </div>';
            }
            ?>
        </div>
        <div class="main-btn-container">
            <a href="/ezolar/Product/newProductPage">
            <div class="add-product-btn">
                <div class="add-product-btn-text">
                    Add Product
                </div>
            </div></a>
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