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
        <div class="dashboard-common-heading-and-background-container">
            <div class="dashboard-common-heading-container">
                <div class="dashboard-common-heading-back-btn">
                    <a href=”” “text-decoration: none”>
                        <img src="\ezolar\public\img\storekeeper\Back.png">
                    </a>
                </div>
                <div class="dashboard-common-heading-text">
                    <b>Add a new Product</b>
                </div>
                <div class="dashboard-common-heading-image">
                    <a href=”” “text-decoration: none”>
                        <img src="\ezolar\public\img\storekeeper\Products.png" alt="Products-icon">
                    </a>
                </div>
            </div>  
            <div class="form-background">
                <form class="form-container" action="/ezolar/Product/newProduct" method="POST">
                    <div class="form-inline">
                        <div class="form-item-container">
                            <div class="form-item-text">
                                Product ID:<span style="color:red;">*</span> <span class="err-box" id="pid-err"></span>
                            </div>
                            <div class="form-idgen-inline">
                                <input class="form-item-input" name="product-id" id="product-id" type="text" placeholder="Enter Product ID" style="width:88%;" required onkeyup="validateProductID(<?php
                                        $a = array();
                                        if  (count($_SESSION['rows'])>0){
                                            for ($x = 0; $x < count((array)$_SESSION['rows']); $x++) {
                                                array_push($a,$_SESSION['rows'][$x]->productID);
                                            }
                                        }
                                        //ignore the errors
                                        $finalArray = "['" . implode ( "', '", $a ) . "']";
                                        echo $finalArray
                                        ?>)" >
                                <div class="form-idgen-btn" title="Auto Generate ID" onclick="generateProductID(<?php echo $finalArray?>)">   
                                    <img src="\ezolar\public\img\storekeeper\idgen.png" class="form-idgen-img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="form-item-container">
                            <div class="form-item-text">
                                Product Name:<span style="color:red;">*</span> <span class="err-box" id="pname-err"></span>
                            </div>
                            <input class="form-item-input" name="product-name" id="product-name" type="text" placeholder="Enter Product Name" required onkeyup="validateProductName()">
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                Manufacturer: <span class="err-box" id="manuf-err"></span>
                            </div>
                            <input class="form-item-input" name="manufacturer" id="manufacturer" type="text" placeholder="Enter Manufacturer" onkeyup="validateManufacturer()">
                        </div>
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                Product Type:
                            </div>
                            <select class="form-item-input-dropdown" name="product-type" id="product-type">
                                <option value="" selected disabled>Select Product Type</option>
                                <option value="inverter">Inverter</option>
                                <option value="panel">Solar Panels</option>
                                <option value="battery">Battery</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                Price (Rs.):<span style="color:red;">*</span> <span class="err-box" id="price-err"></span>
                            </div>
                            <input class="form-item-input" name="price" id="price" type="text" placeholder="Enter Price" required onkeyup="validatePrice()">
                        </div>
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                Availability:
                            </div>
                            <select class="form-item-input-dropdown" name="availability" id="availability">
                                <option value="instock" selected>In-stock</option>
                                <option value="nostock">Out of stock</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-inline" style="justify-content:center;">
                        <button class="form-submit-btn" type="submit" onclick="return validateForm()">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="\ezolar\public\js\product_validation.js"></script>
</body>
</html>