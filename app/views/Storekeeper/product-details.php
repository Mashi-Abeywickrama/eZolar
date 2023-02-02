<?php
    //  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
     require_once(__ROOT__.'app\views\Includes\header.php');
     require_once(__ROOT__.'app\views\Includes\navbar.php');
     require_once(__ROOT__.'app\views\Includes\footer.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <link rel="stylesheet" href="\ezolar\public\css\storekeeper.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\products-advanced.css">
    <title>My Projects</title>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-heading">
            <b>Storekeeper Dashboard</b>
        </div>
        <div class="sidebar-link-container-group">
            <div class="sidebar-link-container-top">
                <div class="sidebar-link-container">
                    Inventory
                </div>
                <div class="sidebar-link-container-selected">
                    Products
                </div>
                <div class="sidebar-link-container">
                    Packages
                </div>
                <div class="sidebar-link-container">
                    Reports & Stats
                </div>
            </div>

            <div class="sidebar-link-container-bottom">
                <div class="sidebar-link-container">
                    Profile
                </div>
                <div class="sidebar-link-container">
                    Settings
                </div>
            </div>
        </div>
    </div>
    <div class="common-main-container">
        <div class="dashboard-common-heading-and-background-container">
            <div class="dashboard-common-heading-container">
                <div class="dashboard-common-heading-back-btn">
                    <a href=”” “text-decoration: none”>
                        <img src="\ezolar\public\img\storekeeper\Back.png">
                    </a>
                </div>
                <div class="dashboard-common-heading-text">
                    <b>Product Details</b>
                </div>
                <div class="dashboard-common-heading-image">
                    <a href=”” “text-decoration: none”>
                        <img src="\ezolar\public\img\storekeeper\Products.png" alt="Products-icon">
                    </a>
                </div>
            </div>  
            <div class="form-background">
                <div class="product-image-container">
                    <img src="\ezolar\public\img\storekeeper\placeholder-image.png" alt="" class="product-image">
                </div>
                <div class="form-container">
                    <div class="form-inline">
                        <div class="form-item-container">
                            <div class="form-item-text">
                                Product ID:
                            </div>
                            <div class="form-item-input-disabled">12345</div>
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="form-item-container">
                            <div class="form-item-text">
                                Product Name:
                            </div>
                            <div class="form-item-input-disabled">ABCDEFG</div>
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                Manufacturer:
                            </div>
                            <div class="form-item-input-disabled">ABCDEFG</div>
                        </div>
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                Product Type:
                            </div>
                            <div class="form-item-input-disabled">ABCDEFG</div>
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                Price (Rs.):
                            </div>
                            <div class="form-item-input-disabled">ABCDEFG</div>
                        </div>
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                Availability:
                            </div>
                            <div class="form-item-input-disabled">ABCDEFG</div>
                        </div>
                    </div>
                    <div class="form-inline" style="justify-content:center;">
                        <button class="form-submit-btn">Edit Product</button>
                        <button class="form-submit-btn">Delete Product</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>