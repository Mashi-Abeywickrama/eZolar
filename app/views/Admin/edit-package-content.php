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
    <link href='https://fonts.googleapis.com/css?family=Space Mono' rel='stylesheet'>
    <link rel="stylesheet" href="\ezolar\public\css\admin\admin.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\packages-advanced.css">
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
            <a href="<?=URLROOT?>/Package"><div class="box2" style="color: #ffffff;background-color: #0b2f64;">
                    Packages
            </div></a>
            <a href="<?=URLROOT?>/Product"><div class="box3">
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
                        <span class="form-table-header-text pack-content-col1"> Product Name</span> <span class="form-table-header-text pack-content-col2"> Price per item</span> <span class="form-table-header-text pack-content-col3"> Quantity</span> <span class="form-table-header-text pack-content-col4"></span>
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
                            <span class="form-table-row-text pack-content-col4"><a class="form-item-remover-container" href="/ezolar/Package/packageRemoveItem/'.$_SESSION['row']-> packageID.'/'.$product -> Product_productID.'"><img class="form-item-remover-icon" src="\ezolar\public\img\storekeeper\item-remove.png"></a></span>
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
                            <select class="form-item-input" name="item-id" id="item-id" style="font-family: 'Space Mono';">
                            <option value="NULL" selected disabled> </option>
                                <?php
                                $results = $_SESSION['rowss'];
                                foreach($results as $row){
                                    echo '<option value="'.$row -> productID.'">['.$row -> productID.'] '.$row -> productName.'</option>';
                                }
                                ?>
                            </select>
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
    </div>
<div class = "f">
<?php
$this->view('Includes/footer', $data);
?>
</div>
</body>
</html>