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
                    <a href="/ezolar/Package" “text-decoration: none”>
                        <img src="\ezolar\public\img\storekeeper\Back.png">
                    </a>
                </div>
                <div class="dashboard-common-heading-text">
                    <b>Package Details</b>
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
                    <div class="form-inline">
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                Package Type:
                            </div>
                            <div class="form-item-input-disabled"><?php
                            $row = $_SESSION['row'];
                            echo $row -> type;?></div>
                        </div>
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                Budget Range (Rs):
                            </div>
                            <div class="form-item-input-disabled"><?php
                            $row = $_SESSION['row'];
                            echo $row -> budgetRange;?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-inline">
                <div class="package-table-container">
                    <div class="form-table-header-container">
                        <span class="form-table-header-text pack-content-col1"> Product Name</span> <span class="form-table-header-text pack-content-col2"> Price per item</span> <span class="form-table-header-text pack-content-col3"> Quantity</span>
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
                            <span class="form-table-row-text pack-content-col1">'.$product -> productName.'</span> 
                            <span class="form-table-row-text pack-content-col2">'.$product -> cost.'</span> 
                            <span class="form-table-row-text pack-content-col3">'.$product -> productQuantity.'</span>
                            </div>';
                            $counter = ($counter+1)%2;
                        }
                        ?>
                    </div>
                    
                </div>
            </div>
            <div class="package-btn-container" style="justify-content:center;">
                <a href="/ezolar/Package/editPackageInfoPage/<?php $row = $_SESSION['row'];
                    echo $row -> packageID;?>"><button class="form-submit-btn">Edit Package Info</button></a>
                <a href="/ezolar/Package/editPackageContentPage/<?php $row = $_SESSION['row'];
                    echo $row -> packageID;?>"><button class="form-submit-btn">Edit Package Content</button></a>
                <a href="/ezolar/Package/removePackage/<?php $row = $_SESSION['row'];
                    echo $row -> packageID;?>"><button class="form-submit-btn">Delete Package</button></a>
            </div>
        
            </div>
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