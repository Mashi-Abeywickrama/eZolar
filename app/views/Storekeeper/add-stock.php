<?php
    //  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
     require_once(__ROOT__.'\app\views\Includes\header.php');
     require_once(__ROOT__.'\app\views\Includes\navbar.php');
     require_once(__ROOT__.'\app\views\Includes\footer.php');

    $sDate = $_SESSION['stockDetails'][0];
    $snFlag = "selected";
    $saFlag = "";
    $swFlag = "";

    if ($_SESSION['stockDetails'][1]=='Arrival'){
        $saFlag = "selected";
    } else if ($_SESSION['stockDetails'][1]=='Withdrawal'){
        $swFlag = "selected";
    }


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
    <title>My Projects</title>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-heading">
            <b>Storekeeper Dashboard</b>
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
                    <b>Add a new Stock</b>
                </div>
                <div class="dashboard-common-heading-image">
                    <a href=”” “text-decoration: none”>
                        <img src="\ezolar\public\img\storekeeper\Products.png" alt="Products-icon">
                    </a>
                </div>
            </div>  
            <div class="form-background" style="flex-direction: column; align-items: center;">
            <form class="form-container" action="/ezolar/Inventory/addStock" method="POST">
                <div class="form-inline">
                        <div class="form-item-container">
                            <div class="form-item-text">
                                Stock ID:
                            </div>
                            <input class="form-item-input" name="stock-id" id="stock-id" type="text" value="<?php
                            $row = $_SESSION['stockID'];
                            echo $row;?>" disabled>
                        </div>
                </div>
                <div class="form-inline">
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                Arrival Date:
                            </div>
                            <input class="form-item-input" name="arrival-date" id="arrival-date" type="date" value="<?php echo $sDate?>">
                        </div>
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                Stock Type:
                            </div>
                            <select class="form-item-input" name="stock-type" id="stock-type" class="err-box" onchange="checkStockType()">
                                <option value="NULL" <?php echo $snFlag?> disabled></option>
                                <option value="Arrival" <?php echo $saFlag?>>Arrival</option>
                                <option value="Withdrawal" <?php echo $swFlag?>>Withdrawal</option>
                            </select>
                            <div id="type-error-box" class="err-box"></div>
                        </div>
                </div>
                <div id="table-error-box" class="err-box"></div>
                <div class="form-table-container" style="width:auto;">
                        <div class="form-table-header-container">
                            <span class="form-table-header-text pack-content-col1">Product Name</span> <span class="form-table-header-text pack-content-col2">Price per item</span> <span class="form-table-header-text pack-content-col3">Quantity</span> <span class="form-table-header-text pack-content-col4"></span>
                        </div>
                        <div class="form-table-body-container">
                                                    <?php
                            $results = $_SESSION['stockContent'];
                            $counter = 0;
                            for($i = 0; $i < count($results);$i++){
                                $product = $results[$i];
                                if ($counter == 1){
                                    $styleClass = 'form-table-row-container alt-row-colors';
                                }else{
                                    $styleClass = 'form-table-row-container';
                                };
                                echo '<div class="'.$styleClass.'">
                                <span class="form-table-row-text pack-content-col1">'.$product[0] -> productName.'</span> 
                                <span class="form-table-row-text pack-content-col2">'.$product[0] -> cost.'</span> 
                                <span class="form-table-row-text pack-content-col3">'.$product[1].'</span>
                                <span class="form-table-row-text pack-content-col4"><a class="form-item-remover-container" href="/ezolar/Inventory/removeStockItem/'.$i.'"><img class="form-item-remover-icon" src="\ezolar\public\img\storekeeper\item-remove.png"></a></span>
                                </div>';
                                $counter = ($counter+1)%2;
                            }
                            ?>
                        </div>
                        <div id="item-adder-error-box" class="err-box"></div>
                        <div class="form-item-adder-container">
                            <div class="form-item-adder-content-container">
                                Product ID:
                                <select class="form-item-input" name="item-id" id="item-id" style="font-family: 'Space Mono';" onchange="resetError()">
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
                                <input class="form-item-input" name="item-quantity" id="item-quantity" type="text" placeholder="Eg:- 5" onkeyup="resetError()">
                            </div>
                            <div class="form-item-adder-content-container">
                                <button class="form-item-adder-btn" type="Submit" formaction="/ezolar/Inventory/addStocksItem" id="add-item-btn" onclick="return validateItemAdder()">Add item</button>
                            </div>
                        </div>
                        </div>
                    
                    <div class="form-button-container" style="width:100%; justify-content:center;">
                        <button class="form-submit-btn" type="submit" id="Submit-btn" onclick="return validateStock()">Submit</button>
                        <a href="/ezolar/Inventory/clearStockContent"><button class="form-submit-btn" type ="button">Clear</button></a>
                    </div>
                    </form>
            </div> 
        </div>
    </div>
    <script src="\ezolar\public\js\stock_validation.js"></script>
</body>
</html>