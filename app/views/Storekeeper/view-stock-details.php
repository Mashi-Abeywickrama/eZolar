<?php
    require_once(__ROOT__.'\app\views\Customer\navbar.php');
    $details = $_SESSION['row'];
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
    <style>
    .pack-content-col3 {
        width: 5%;
    }
    .pack-content-col4 {
        width: 12%;
    }
    .form-table-body-container{
    overflow-x: hidden;
    overflow-y: scroll;
    height: 300px;
    }
    </style>
</head>
<body>
<div class="body-container"> 
    <div class="left-panel">
        <div class="sidebar-heading">
        <a class="sidebar-anchor" href="/ezolar/user/dashboard"><b>Storekeeper Dashboard</b></a>
        </div>
        <div class="sidebar-link-container-group">
            <div class="sidebar-link-container-top">
                <a class="sidebar-anchor" href="/ezolar/Inventory"><div class="sidebar-link-container-selected">
                    Inventory
                </div></a>
                <a class="sidebar-anchor" href="/ezolar/Product"><div class="sidebar-link-container">
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
                    <a href="/ezolar/Inventory/viewStocks" “text-decoration: none”>
                        <img src="\ezolar\public\img\storekeeper\Back.png">
                    </a>
                </div>
                <div class="dashboard-common-heading-text">
                    <b>View Stock Details</b>
                </div>
                <div class="dashboard-common-heading-image">
                    <a href=”” “text-decoration: none”>
                        <img src="\ezolar\public\img\storekeeper\Products.png" alt="Products-icon">
                    </a>
                </div>
            </div>  
            <div class="form-background" style="flex-direction: column; align-items: center;">
            <form class="form-container" method="POST">
                <div class="form-inline">
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                Stock ID:
                            </div>
                            <input class="form-item-input" name="stock-id" id="stock-id" type="text" value="<?php echo $details->stockID;?>" disabled>
                        </div>
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                Recorded by:
                            </div>
                            <input class="form-item-input" name="stock-id" id="stock-id" type="text" value="<?php echo $details->Storekeeper_Employee_empID;?>" disabled>
                        </div>
                </div>
                <div class="form-inline">
                <div class="form-item-container-half">
                            <div class="form-item-text">
                                Arrival Date:
                            </div>
                            <input class="form-item-input" name="stock-id" id="stock-id" type="text" value="<?php echo substr($details->arrivalDate,0,10);?>" disabled>
                        </div>
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                Stock Type:
                            </div>
                            <input class="form-item-input" name="stock-id" id="stock-id" type="text" value="<?php echo $details->stockType;?>" disabled>
                        </div>
                </div>
                    <div class="form-table-container" style="width:auto;">
                        <div class="form-table-header-container">
                            <span class="form-table-header-text pack-content-col1">Product Name</span> <span class="form-table-header-text pack-content-col2">Price per item</span> <span class="form-table-header-text pack-content-col3">Quantity</span> <span class="form-table-header-text pack-content-col4">Total</span>
                        </div>
                        <div class="form-table-body-container">
                                                    <?php
                            $results = $_SESSION['rows'];
                            $counter = 0;
                            $total = 0;
                            for($i = 0; $i < count($results);$i++){
                                $product = $results[$i];
                                if ($counter == 1){
                                    $styleClass = 'form-table-row-container alt-row-colors';
                                }else{
                                    $styleClass = 'form-table-row-container';
                                };
                                echo '<div class="'.$styleClass.'">
                                <span class="form-table-row-text pack-content-col1">'.$product -> productName.'</span> 
                                <span class="form-table-row-text pack-content-col2">Rs.'.number_format($product -> cost,0,'.',',').'/=</span> 
                                <span class="form-table-row-text pack-content-col3">'.$product -> stockProductQuantity.'</span>
                                <span class="form-table-row-text pack-content-col4">Rs.'.number_format($product -> cost*$product -> stockProductQuantity,0,'.',',').'/=</span>
                                </div>';
                                $total += $product -> cost*$product -> stockProductQuantity;
                                $counter = ($counter+1)%2;
                            }
                            ?>
                        </div>
                    </div>
                    <div class="form-table-subtotal-container">
                        <div class="form-table-subtotal-text"><b>Total Stock Value</b></div>
                        <div class="form-table-subtotal-text"><b><?php echo 'Rs.'.number_format($total,0,'.',',').'/='; ?></b></div>
                    </div>
                    </form>
            </div> 
        </div>
    </div>
    </div>
<div class="f">
    <?php 
      $this->view('Includes/footer', $data);
      unset($_SESSION['row'],$_SESSION['rows']);
    ?>
</div>
</body>
</html>