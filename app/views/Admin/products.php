<?php
    //  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
    require_once(__ROOT__.'\app\views\Customer\navbar.php');
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
            <a href="<?=URLROOT?>/Package"><div class="box2">
                    Packages
            </div></a>
            <a href="<?=URLROOT?>/Product"><div class="box3" style="color: #ffffff;background-color: #0b2f64;">
                    Products
            </div></a>
            <a href="<?=URLROOT?>/Statistics/salesPerMonth"><div class="box4">
                    Reports
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
    </div>
<div class = "f">
<?php
$this->view('Includes/footer', $data);
?>
</div>
</body>
</html>