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
    <link rel="stylesheet" href="\ezolar\public\css\admin\admin.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\products-advanced.css">
    <title>My Projects</title>
</head>
<body>

<div class="body-container">
    <div class="left-panel">
        <a href="<?=URLROOT?>/user/dashboard"><div class ="box1">
            Admin Dashboard
        </div></a>
        <div class="rest">
            <div class="rest-top">
            <a href="<?=URLROOT?>/Employee"><div class="box7" >
                    Employees
            </div></a>
            <a href="<?=URLROOT?>/AdminProject"><div class="box9">
                    Projects
            </div></a>
            <a href="<?=URLROOT?>/Package"><div class="box2">
                    Packages
            </div></a>
            <a href="<?=URLROOT?>/Product"><div class="box3" style="color: #ffffff;background-color: #0b2f64;">
                    Products
            </div></a>
            <a href="<?=URLROOT?>/Statistics/salesPerMonth"><div class="box4">
                    Reports
            </div></a>
            <a href="<?=URLROOT?>/AdminIssue"><div class="box8">
                    Issues
            </div></a>
            

        </div>
        <div class="rest-bottom">
            <a href="<?=URLROOT?>/AdminViewProfile"><div class="box5">
                Profile
            </div></a>
            <a href="<?=URLROOT?>/"><div class="box6">
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
                    <img src="\ezolar\public\img\storekeeper\product-imgs\<?php echo $_SESSION['row']->productImg ?>" alt="" class="product-image">
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
                            echo $row -> cost;?></div>
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
                        <a href="/ezolar/Product/editProductPage/<?php $row = $_SESSION['row'];
                            echo $row -> productID;?>"><button class="form-submit-btn">Edit Product</button></a>
                        <a href="/ezolar/Product/removeProduct/<?php $row = $_SESSION['row'];
                            echo $row -> productID;?>"><button class="form-submit-btn">Delete Product</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<div class = "f">
<?php
$this->view('Includes/footer', $data);
?>
</div>
</body>
</html>