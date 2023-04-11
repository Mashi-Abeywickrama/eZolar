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
    <link rel="stylesheet" href="\ezolar\public\css\packages-advanced.css">
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
                    <div class="sidebar-link-container-selected">
                        Packages
                    </div>
                </a>
                <a href=/ezolar/Product>
                    <div class="sidebar-link-container">
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
        <div class="dashboard-common-heading-and-background-container">
            <div class="dashboard-common-heading-container">
                <div class="dashboard-common-heading-back-btn">
                    <a href="/ezolar/Package/packageDetailspage/<?php
                            $row = $_SESSION['row'];
                            echo $row -> packageID;?>" “text-decoration: none”>
                        <img src="\ezolar\public\img\storekeeper\Back.png">
                    </a>
                </div>
                <div class="dashboard-common-heading-text">
                    <b>Edit Package Content</b>
                </div>
                <div class="dashboard-common-heading-image">
                    <a href=”” “text-decoration: none”>
                        <img src="\ezolar\public\img\storekeeper\Products.png" alt="Products-icon">
                    </a>
                </div>
            </div>  
            <div class="form-background-details">
                <div class="product-image-container">
                    <img src="\ezolar\public\img\storekeeper\placeholder-image.png" alt="" class="product-image">
                </div>
                <div class="form-container">
                    <div class="save-box"> <?php
                            if ($_SESSION['flagUpdate']==1){
                                echo 'Changes Saved!';
                                $_SESSION['flagUpdate'] = 0;
                            };?></div>
                    <div class="form-inline">
                        <div class="form-item-container">
                            <div class="form-item-text">
                                Package ID:
                            </div>
                            <div class="form-item-input-disabled"><?php
                            $row = $_SESSION['row'];
                            echo $row -> packageID;?></div>
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="form-item-container">
                            <div class="form-item-text">
                                Package Name:
                            </div>
                            <div class="form-item-input-disabled"><?php
                            $row = $_SESSION['row'];
                            echo $row -> name;?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-inline">
                <div class="form-table-container">
                    <div class="form-table-header-container">
                        <span class="form-table-header-text"> Product Name</span> <span class="form-table-header-text"> Price per item</span> <span class="form-table-header-text"> Quantity</span>
                    </div>
                    <div class="form-table-body-container">
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
                            <span class="form-table-row-text">'.$product -> productName.'</span> 
                            <span class="form-table-row-text">'.$product -> productName.'</span> 
                            <span class="form-table-row-text">'.$product -> productQuantity.'</span>
                            </div>';
                            $counter = ($counter+1)%2;
                        }
                        ?>
                    </div>
                    <form class="form-item-adder-container" action="/ezolar/Package/packageAddItem/<?php
                            $row = $_SESSION['row'];
                            echo $row -> packageID;?>" method="POST">
                        <div class="form-item-adder-content-container">
                            Product ID:
                            <input class="form-item-input" name="item-id" id="item-id" type="text" placeholder="Eg:- abc123" required onkeyup="validateProductID()">
                        </div>
                        <div class="form-item-adder-content-container">
                            Quantity
                            <input class="form-item-input" name="item-quantity" id="item-quantity" type="text" placeholder="Eg:- 5" required onkeyup="">
                        </div>
                        <div class="form-item-adder-content-container">
                            <button class="form-item-adder-btn" type="Submit" onclick="">Add item</button>
                        </div> 
                    </form>
            </div>
        
            </div>
        </div>
    </div>
    <script src="\ezolar\public\js\product_validation.js"></script>
</body>
</html>