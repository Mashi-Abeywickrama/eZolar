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
    <link rel="stylesheet" href="\ezolar\public\css\packages-advanced.css">
    <title>Add Package</title>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-heading">
            <b>Storekeeper Dashboard</b>
        </div>
        <div class="sidebar-link-container-group">
            <div class="sidebar-link-container-top">
                <a class="sidebar-anchor" href="/ezolar/Inventory"><div class="sidebar-link-container">
                    Inventory
                </div></a>
                <a class="sidebar-anchor" href="/ezolar/Product"><div class="sidebar-link-container">
                    Products
                </div></a>
                <a class="sidebar-anchor" href="/ezolar/Package"><div class="sidebar-link-container-selected">
                    Packages
                </div></a>
                <a class="sidebar-anchor" href=""><div class="sidebar-link-container">
                    Reports & Stats
                </div></a>
            </div>

            <div class="sidebar-link-container-bottom">
                <a class="sidebar-anchor" href=""><div class="sidebar-link-container">
                    Profile
                </div></a>
                <a class="sidebar-anchor" href=""><div class="sidebar-link-container">
                    Settings
                </div></a>
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
                    <b>Add a new Package</b>
                </div>
                <div class="dashboard-common-heading-image">
                    <a href=”” “text-decoration: none”>
                        <img src="\ezolar\public\img\storekeeper\Products.png" alt="Products-icon">
                    </a>
                </div>
            </div>  
            <div class="form-background">
                <form class="form-container" action="/ezolar/Package/newPackage" method="POST">
                    <div class="form-inline">
                        <div class="form-item-container">
                            <div class="form-item-text">
                                Package ID:<span style="color:red;">*</span> <span class="err-box" id="pckid-err"></span>
                            </div>
                            <input class="form-item-input" name="pack-id" id="pack-id" type="text" placeholder="Enter Package ID" required onkeyup="validatePackageID()">
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="form-item-container">
                            <div class="form-item-text">
                                Package Name:<span style="color:red;">*</span> <span class="err-box" id="pckname-err"></span>
                            </div>
                            <input class="form-item-input" name="pack-name" id="pack-name" type="text" placeholder="Enter Package Name" required onkeyup="validatePackageName()">
                        </div>
                    </div>
                    <div class="form-inline">
                    <div class="form-item-container">
                            <div class="form-item-text">
                                Package Type: <span class="err-box" id="pck-type-err"></span>
                            </div>
                            <input class="form-item-input" name="pack-type" id="pack-type" type="text" placeholder="Eg:- Residential" onkeyup="validateType()">
                        </div>
                    </div>
                    <div class="form-item-text">
                                Price Range: <span class="err-box" id="price-rng-err"></span>
                            </div>
                    <div class="form-inline">
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                Lower Limit:
                            </div>
                            <input class="form-item-input" name="price-range-lower" id="price-range-lower" type="text" placeholder="Eg:- 200,000" onkeyup="validateBudget()">
                        </div>
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                Upper Limit:
                            </div>
                            <input class="form-item-input" name="price-range-upper" id="price-range-upper" type="text" placeholder="Eg:- 200,000" onkeyup="validateBudget()">
                        </div>
                    </div>
                    <!--<div class="form-inline">
                        <div class="form-table-container">
                            <div class="form-table-header-container">
                                <span class="form-table-header-text"> Product Name</span> <span class="form-table-header-text"> Price per item</span> <span class="form-table-header-text"> Quantity</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="form-item-adder-container">
                            <div class="form-item-adder-content-container">
                                Product ID:
                                <input class="form-item-input" name="item-id" id="item-id" type="text" placeholder="Eg:- abc123" onkeyup="">
                            </div>
                            <div class="form-item-adder-content-container">
                                Quantity
                                <input class="form-item-input" name="item-quantity" id="item-quantity" type="text" placeholder="Eg:- 5" onkeyup="">
                            </div>
                            <div class="form-item-adder-content-container">
                                <button class="form-item-adder-btn" onclick=" ">Add item</button>
                            </div>
                        </div>
                    </div>-->
                    <div class="form-inline" style="justify-content:center;">
                        <button class="form-submit-btn" type="submit" onclick="return validateForm()">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="\ezolar\public\js\package_validation.js"></script>
</body>
</html>