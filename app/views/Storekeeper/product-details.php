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
    <link rel="stylesheet" href="\ezolar\public\css\products-advanced.css">
    <title>My Projects</title>
</head>
<body>
    <?php require_once(__ROOT__.'\app\views\popupList\productImgPopup.php');
    require_once(__ROOT__.'\app\views\popupList\confirmationPopup.php');?>
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
        <div class="dashboard-common-heading-and-background-container">
            <div class="dashboard-common-heading-container">
                <div class="dashboard-common-heading-back-btn">
                    <a href="/ezolar/Product" “text-decoration: none”>
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
                    <img src="\ezolar\public\img\storekeeper\product-imgs\<?php echo $_SESSION['row']->productImg ?>" alt="Product image" class="product-image">
                    <div class="product-image-btn" id="img-btn">Change Image</div>
                    <script>
                        var img_btn = document.getElementById("img-btn");

                        img_btn.addEventListener('click', function()
                        {
                            document.getElementById("id001").style.display="block";
                        });
                    </script>
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
                                Product ID:
                            </div>
                            <div class="form-item-input-disabled"><?php
                            $row = $_SESSION['row'];
                            echo $row -> productID;?></div>
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="form-item-container">
                            <div class="form-item-text">
                                Product Name:
                            </div>
                            <div class="form-item-input-disabled"><?php
                            $row = $_SESSION['row'];
                            echo $row -> productName;?></div>
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                Manufacturer:
                            </div>
                            <div class="form-item-input-disabled"><?php
                            $row = $_SESSION['row'];
                            echo $row -> manufacturer;?></div>
                        </div>
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                Product Type:
                            </div>
                            <div class="form-item-input-disabled"></div>
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                Price (Rs.):
                            </div>
                            <div class="form-item-input-disabled"><?php
                            $row = $_SESSION['row'];
                            echo number_format($row -> cost,0,'.',',');?></div>
                        </div>
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                Reorder Level:
                            </div>
                            <div class="form-item-input-disabled"><?php
                            $row = $_SESSION['row'];
                            echo $row->reorderLimit?></div>
                        </div>
                    </div>
                    <div class="form-inline" style="justify-content:center;">
                        <a class="form-submit-btn" style="text-align:center;" href="/ezolar/Product/editProductPage/<?php $row = $_SESSION['row'];
                            echo $row -> productID;?>">Edit Product</a>
                        <a class="form-submit-btn" style="text-align:center;" id="del-btn">Delete Product</a>
                    </div>
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
<script>
    var del_btn = document.getElementById('del-btn');
    var text_box = document.getElementById('text');
    var yes_btn = document.getElementById('yes-btn');
    var no_btn = document.getElementById('no-btn');

    del_btn.addEventListener('click', function()
    {
        text_box.innerHTML = "This will Delete the product \"<?php echo $row -> productName;?>\" <br> Do you wish to proceed?";
        yes_btn.setAttribute("href", "/ezolar/Product/removeProduct/<?php echo $row -> productID;?>");
        document.getElementById("confirm-pop").style.display="block";
    });
    
</script>
</body>
</html>