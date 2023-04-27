<?php
//  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
//    require_once(__ROOT__.'/app/views/Includes/header.php');
//    require_once(__ROOT__.'/app/views/Includes/navbar.php');
//    require_once(__ROOT__.'/app/views/Includes/footer.php');
require_once(__ROOT__.'\app\views\Customer\navbar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\salesperson.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\respond-inquiries.css">
    <title>My Projects</title>
</head>
<div>

<div class="body-container">
<div class="left-panel">
        <a href="<?=URLROOT?>/user/dashboard"><div class ="box1">
            Salesperson Dashboard
        </div></a>
        <div class="rest">
            <div class="rest-top">
            <a href="<?=URLROOT?>/Project/SalespersonViewProjects"><div class="box7">
                    Assigned Projects
                </div></a>
            <a href="<?=URLROOT?>/Inquiry/getSalespersonInquiries"><div class="box2">
                    Inquiries
            </div></a>
            <a href="<?=URLROOT?>/SalespersonSchedules/InspectionSchedule"><div class="box3">
                Inspection Schedule
            </div></a>
            <a href="<?=URLROOT?>/SalespersonSchedules/DeliverySchedule"><div class="box4">
                Delivery Schedule
            </div></a>
            
            <a href="<?=URLROOT?>/Employee/EngineersAndContractors"><div class="box8">
            Engineers & Contractors
            </div></a>

        </div>
        <div class="rest-bottom">
            <a href="<?=URLROOT?>/user/profile"><div class="box5">
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
                <a href="/ezolar/Inquiry/getSalespersonInquiries" “text-decoration: none”>
                    <img src="\ezolar\public\img\admin\back.png" alt="back-icon">
                </a>
            </div>
            <div class="dashboard-common-heading-text">
                <b>Respond to Inquiry</b>
            </div>
            <div class="dashboard-common-heading-image">
                <a href=”” “text-decoration: none”>
                    <img src="\ezolar\public\img\salesperson\inquiries.png" alt="inquiry-icon">
                </a>
            </div>

        </div>

<?php
$results = $_SESSION['rows'];
foreach($results as $row){
    echo '

<div class="forms">
        <div class="form-background">

            <form class="form-container" >
                <div class="form-inline">
                    <div class="form-item-container-half">
                        <div class="form-item-text">
                            From :
                        </div>
                        <input class="form-item-input" name="" id="" type="text" value="' . $row -> name . '" readonly>
                    </div>
                    <div class="form-item-container-half">
                        <div class="form-item-text">
                            Project ID :
                        </div>
                        <input class="form-item-input" name="" id="" type="text" value="' . $row -> Project_projectID . '" readonly>
                    </div>
                </div>
                <div class="form-inline">
                    <div class="form-item-container">
                        <div class="form-item-text">
                            Topic :
                        </div>
                        <input class="form-item-input" name="" id="" type="text" value="' . $row -> topic . '" readonly>
                    </div>
                </div>
            </form>

        </div>
                ';
}
?>
        <div id='message-container' class="message-container">

<!--            --><?php
//            $results = $_SESSION['rowsNew'];
//            foreach($results as $row) {
//                if ($row -> sender == 0){
//                    echo "<div class='sender-container'>
//                        <p id='sender' class='sending-message'>
//                        " . $row -> message . "
//                        </p>
//                    </div>";
//                }else{
//                    echo "<div class='receiver-container'>
//                        <p id='receiver' class='incoming-message'>
//                        " . $row -> message . "
//                        </p>
//                    </div>";
//                }
//            }
//            ?>

        </div>
        <form id="message-form-data" class="message-form-data">
            <div class="model-footer">
                <textarea id="insert-message" class="insert-message" name="message"></textarea>
                <button id="send-message" class="send-message-btn" type="submit">Send</button>
            </div>
        </form>
        </div>

    </div>
</div>
</div>
<script type="text/javascript" src="\ezolar\public\js\chat.js"></script>
<div class="f">
    <?php
    require_once(__ROOT__.'\app\views\Includes\footer.php');
    ?>
</div>
</body>



<!--<script type="text/javascript">-->
<!--    $(document).ready(function (){-->
<!--        $("#send").on("click",function ()){-->
<!--            $.ajax({-->
<!--                url:"ChatSystem/insertMessage",-->
<!--                method:"POST",-->
<!--                data:{-->
<!--                    message:$("#message").value()-->
<!--                },-->
<!--                dataType:"text",-->
<!--                success:function (data){-->
<!--                    $("#message").value("");-->
<!--                }-->
<!--            })-->
<!--        }-->
<!--    })-->
<!--</script>-->

</html>



