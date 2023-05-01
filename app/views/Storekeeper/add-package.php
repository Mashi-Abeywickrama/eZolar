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
    <link rel="stylesheet" href="\ezolar\public\css\packages-advanced.css">
    <title>Add Package</title>
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
                            <div class="form-idgen-inline">
                                <input class="form-item-input" name="pack-id" id="pack-id" type="text" placeholder="Enter Package ID" style="width:88%;" required onkeyup="validatePackageID(<?php
                                            $a = array();
                                            if  (count($_SESSION['rows'])>0){
                                                for ($x = 0; $x < count((array)$_SESSION['rows']); $x++) {
                                                    array_push($a,$_SESSION['rows'][$x]->packageID);
                                                }
                                            }
                                            //ignore the errors
                                            $finalArray = "['" . implode ( "', '", $a ) . "']";
                                            echo $finalArray
                                            ?>)">
                                        <div class="form-idgen-btn" title="Auto Generate ID" onclick="generatePackageID(<?php echo $finalArray?>)">   
                                            <img src="\ezolar\public\img\storekeeper\idgen.png" class="form-idgen-img">
                                        </div>
                                </div>
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
                            <select class="form-item-input" name="pack-type" id="pack-type">
                                    <option value="" selected disabled>Select Package Types</option>
                                    <option value="Residential">Residential</option>
                                    <option value="Commercial">Commercial</option>
                                    <option value="Industrial">Industrial</option>
                            </select>
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
</div>
<div class="f">
    <?php 
      $this->view('Includes/footer', $data);
    ?>
</div>
<script src="\ezolar\public\js\package_validation.js"></script>
</body>
</html>