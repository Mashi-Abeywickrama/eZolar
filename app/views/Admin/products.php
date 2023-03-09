<?php
    //  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__.'\app\views\Includes\header.php');
require_once(__ROOT__.'\app\views\Includes\navbar.php');
require_once(__ROOT__.'\app\views\Includes\footer.php');
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
    <link rel="stylesheet" href="\ezolar\public\css\admin\admin.dashboard.common.css">
    <title>My Projects</title>
</head>
<body>

<div class="sidebar">
        <div class="sidebar-heading">
            <b>Admin Dashboard</b>
        </div>
        <div class="sidebar-link-container-group">
            <div class="sidebar-link-container-top">
                <a href="/ezolar/Employee"><div class="sidebar-link-container">
                    Employees
                </div></a>
                <a href=/ezolar/Package>
                    <div class="sidebar-link-container">
                        Packages
                    </div>
                </a>
                <a href=/ezolar/Product>
                    <div class="sidebar-link-container-selected">
                        Products
                    </div>
                </a>
                <div class="sidebar-link-container">
                    Reports 
                </div>
            </div>

            <div class="sidebar-link-container-bottom">
                <a href="/ezolar/AdminViewProfile"><div class="sidebar-link-container">
                    Profile
                </div>
                <div class="sidebar-link-container">
                    Settings
                </div>
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
            
            <div class="common-main-right-img">
                <img src="\ezolar\public\img\profile.png" alt="profile">
            </div>   
        </div>
        <div class="product-list-container">
            <!--<div class="product-card">
                <div class="product-image-container">

                </div>
                <div class="product-text-container">
                    <div class="product-text-container-inner">
                    <div class="product-text-no">Product No. 123456</div>
                    <div class="product-text-name"><b>Pylon Tech Lithium Iron Battery 2.4 kWh</b></div>
                    <div class="product-text-price">Price: Rs. 30,000</div>
                    </div>
                </div>
                <div class="product-details-btn-container">
                    <div class="product-details-btn">
                        <div class="product-details-btn-text">More info</div>
                    </div>
                </div>
            </div>-->
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
        <a href="/ezolar/Product/newProductPage">
        <div class="add-product-btn">
            <div class="add-product-btn-text">
                Add Product
            </div>
        </div></a>
    </div>
</body>
</html>