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
    <link rel="stylesheet" href="\ezolar\public\css\engineer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\engineer.projects.css">
    <link rel="stylesheet" href="\ezolar\public\css\packages-advanced.css">
    <title>My Projects</title>
</head>
<body>

<div class="sidebar">
        <div class="sidebar-heading">
            <b>Engineer Dashboard</b>
        </div>
        <div class="sidebar-link-container-group">
            <div class="sidebar-link-container-top">
                <a class="sidebar-anchor" href="/ezolar/EngineerProject"><div class="sidebar-link-container-selected">
                    Assigned Projects
                </div></a>
                <a class="sidebar-anchor" href="/ezolar/EngineerSchedule"><div class="sidebar-link-container">
                    My Schedule
                </div></a>
                <a class="sidebar-anchor" href="/ezolar/EngineerIssue"><div class="sidebar-link-container">
                    Report an Issue
                </div></a>
            </div>

            <a class="sidebar-anchor" href="/ezolar/User/profile"><div class="sidebar-link-container-bottom">
                <div class="sidebar-link-container">
                    Profile
                </div></a>
            <a class="sidebar-anchor" href=""><div class="sidebar-link-container">
                    Settings
                </div></a>
            </div>
        </div>
    </div>
    <div class="common-main-container">
    <div class="dashboard-common-heading-container" style="width:80%;">
            <div class="dashboard-common-heading-back-btn">
                <a href="/ezolar/EngineerProject/projectDetailsPage/<?php echo $_SESSION['PackMod']['Info']->projectID?>" “text-decoration: none”>
                    <img src="\ezolar\public\img\storekeeper\Back.png">
                </a>
            </div>
            <div class="dashboard-common-heading-text" style="display:flex; flex-direction:column; justify-content:center; align-items:start;">
                <div class="dashboard-common-heading-text" style="padding:unset;">
                    <b>Modify Package</b>
                </div>
                <div class="dashboard-common-heading-text" style="font-size:16px; padding:unset;">
                    <?php echo 'Base Package : '.$_SESSION['PackMod']['Info']->name; ?>
                </div>
            </div>
            <div class="dashboard-common-heading-image">
                <a href=”” “text-decoration: none”>
                    <img src="\ezolar\public\img\engineer\Projects.png" alt="Products-icon">
                </a>
            </div>
        </div>  
        <div class="form-table-container">
                    <div class="form-table-header-container">
                        <span class="form-table-header-text inventory-col1">Product Name</span>  <span class="form-table-header-text inventory-col2">Price per item</span><span class="form-table-header-text inventory-col3">Quantity</span> <span class="form-table-header-text inventory-col4">Price</span>
                    </div>
                    <div class="form-table-body-container">
                                                <?php
                        $results = $_SESSION['PackMod']['Content'];
                        $counter = 0;
                        $contentTotalPrice = 0;
                        foreach($results as $item){
                            if ($counter == 1){
                                $styleClass = 'form-table-row-container alt-row-colors';
                            }else{
                                $styleClass = 'form-table-row-container';
                            };
                            echo '<div class="'.$styleClass.'">
                            <span class="form-table-row-text contents-col1">'.$item -> productName .'</span> 
                            <span class="form-table-row-text contents-col2">'.$item -> cost.'</span> 
                            <span class="form-table-row-text contents-col3">'.$item -> productQuantity.'</span>
                            <span class="form-table-row-text contents-col4">'.strval((int)$item -> cost*$item->productQuantity).'</span>
                            <span class="form-table-row-text contents-col5"><a class="form-item-remover-container" href="/ezolar/EngineerProject/modifyPackageRemoveItem/'.$item -> productID.'"><img class="form-item-remover-icon" src="\ezolar\public\img\engineer\item-remove.png"></a></span>
                            </div>';
                            $counter = ($counter+1)%2;
                            $contentTotalPrice += (int)$item -> cost*(int)$item->productQuantity;
                        }
                        ?>
                    </div>
                    <div class="form-table-total-container">
                        <div class="form-table-total-text"><b>Total Product Cost</b></div>
                        <div class="form-table-total-text"><b><?php echo $contentTotalPrice; ?></b></div>
                    </div>
                    <form action="/ezolar/EngineerProject/modifyPackageAddItem/<?php echo $_SESSION['PackMod']['Info']->projectID?>" class="form-item-adder-container" style="width:auto;" method="POST">
                            <div class="form-item-adder-content-container" style="width:60%;">
                                Product ID:
                                <select class="form-item-input" name="item-id" id="item-id" style="font-family: 'Space Mono';" onchange="resetError()">
                                <option value="NULL" selected disabled> </option>
                                    <?php
                                    $results = $_SESSION['rows'];
                                    foreach($results as $row){
                                        echo '<option value="'.$row -> productID.'">['.$row -> productID.'] '.$row -> productName.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-item-adder-content-container">
                                Quantity:
                                <input class="form-item-input" name="item-quantity" id="item-quantity" type="text" placeholder="Eg:- 5" onkeyup="resetError()">
                            </div>
                            <div class="form-item-adder-content-container">
                                <button class="form-item-adder-btn" type="Submit" id="add-item-btn" onclick="return validateItemAdder()">Add item</button>
                            </div>
                        </div>
                    </form>
                    
                
                <div class="form-table-container">
                    <div class="form-table-header-container">
                        <span class="form-table-header-text extras-col1">Service</span>  <span class="form-table-header-text extras-col2">Price</span>
                    </div>
                    <div class="form-table-body-container" style="height:100px;">
                                                <?php
                        $results = $_SESSION['PackMod']['Extras'];
                        $extraTotalPrice = 0;
                        for($i=0;$i<count($results);$i++){
                            if ($i%2 == 1){
                                $styleClass = 'form-table-row-container alt-row-colors';
                            }else{
                                $styleClass = 'form-table-row-container';
                            };
                            echo '<div class="'.$styleClass.'">
                            <span class="form-table-row-text extras-col1">'.$results[$i] -> description .'</span> 
                            <span class="form-table-row-text extras-col2">'.$results[$i] -> price.'</span>
                            <span class="form-table-row-text extras-col3"><a class="form-item-remover-container" href="/ezolar/EngineerProject/modifyPackageRemoveExtra/'.$i.'"><img class="form-item-remover-icon" src="\ezolar\public\img\engineer\item-remove.png"></a></span>
                            </div>';
                            $extraTotalPrice += (int)$results[$i]->price;
                        }
                        ?>
                    </div>
                    <div class="form-table-total-container">
                        <div class="form-table-total-text"><b>Total Service Cost</b></div>
                        <div class="form-table-total-text"><b><?php echo $extraTotalPrice; ?></b></div>
                    </div>
                    <form action="/ezolar/EngineerProject/modifyPackageAddExtra/<?php echo $_SESSION['PackMod']['Info']->projectID?>" class="form-item-adder-container" style="width:auto;" method="POST">
                            <div class="form-item-adder-content-container" style="width:60%;">
                                Service Name:
                                <input class="form-item-input" name="extra-desc" id="extra-desc" type="text" placeholder="" onkeyup="resetError()">
                            </div>
                            <div class="form-item-adder-content-container">
                                Price:
                                <input class="form-item-input" name="extra-price" id="extra-price" type="text" placeholder="" onkeyup="resetError()">
                            </div>
                            <div class="form-item-adder-content-container">
                                <button class="form-item-adder-btn" type="Submit" id="add-item-btn" onclick="return validateItemAdder()">Add item</button>
                            </div>
                        </div>
                    </form>
                    <div class="form-table-subtotal-container">
                        <div class="form-table-subtotal-text"><b>Total Cost</b></div>
                        <div class="form-table-subtotal-text"><b><?php echo $contentTotalPrice+$extraTotalPrice; ?></b></div>
                    </div>
                    
                <div class="form-button-container" style="justify-content:center;">
                <a href="/ezolar/EngineerProject/saveModifiedPack/<?php echo $_SESSION['PackMod']['Info']->projectID; ?>"><button class="form-submit-btn">Save Changes</button></a>
                <a href="/ezolar/EngineerProject/resetCurrentModifiedPack/<?php echo $_SESSION['PackMod']['Info']->projectID; ?>"><button class="form-submit-btn">Reset Changes</button></a>
            </div>
        </div>
    </div>
</body>
</html>