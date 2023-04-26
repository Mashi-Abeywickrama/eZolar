<?php
require_once(__ROOT__ . '/app/views/Customer/navbar.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\customer.newinquiry.css">
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\respond-inquiries.css">
    <title>My newInquiry</title>
</head>

<body>
    <div class="body-container-main">
        <div class="body-container">
            <div class="left-panel">
                <a href="<?= URLROOT ?>/user/dashboard">
                    <div class="box1">
                        Customer Dashboard
                    </div>
                </a>
                <div class="rest">
                    <div class="rest-top">
                        <a href="<?= URLROOT ?>#">
                            <div class="box7">
                                Packages
                            </div>
                        </a>
                        <a href="<?= URLROOT ?>/project">
                            <div class="box2">
                                My Projects
                            </div>
                        </a>
                        <a href="<?= URLROOT ?>/inquiry">
                            <div class="box3">
                                Inquiries
                            </div>
                        </a>
                        <a href="<?= URLROOT ?>/transaction">
                            <div class="box4">
                                Transactions
                            </div>
                        </a>
                    </div>
                    <div class="rest-bottom">
                        <a href="<?= URLROOT ?>/user/profile">
                            <div class="box5">
                                Profile
                            </div>
                        </a>
                        <a href="<?= URLROOT ?>/customersettings">
                            <div class="box6">
                                Settings
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Remaining... -->
            <div class="common-main-container">

                <div class="dashboard-common-heading-container">
                    <div class="dashboard-common-heading-back-btn">
                        <a href="<?= URLROOT ?>/inquiry" “text-decoration: none”>
                            <img src="\ezolar\public\img\admin\back.png">
                        </a>
                    </div>
                    <div class="dashboard-common-heading-text">
                        <b>Respond to Inquiry</b>
                    </div>


                </div>

                <?php
                $results = $_SESSION['rows'];
                foreach ($results as $row) {
                    echo '

<div class="forms">
        <div class="form-background">

            <form class="form-container" >
                <div class="form-inline">
                    <div class="form-item-container-half">
                        <div class="form-item-text">
                            Assigned Salesperson :
                        </div>
                        <input class="form-item-input" name="" id="" type="text" value="' . $row->name . '" readonly>
                    </div>
                    <div class="form-item-container-half">
                        <div class="form-item-text">
                            Project ID :
                        </div>
                        <input class="form-item-input" name="" id="" type="text" value="' . $row->Project_projectID . '" readonly>
                    </div>
                </div>
                <div class="form-inline">
                    <div class="form-item-container">
                        <div class="form-item-text">
                            Topic :
                        </div>
                        <input class="form-item-input" name="" id="" type="text" value="' . $row->topic . '" readonly>
                    </div>
                </div>
            </form>

        </div>
                ';
                }
                ?>
                <div id='message-container' class="message-container">

                    <!--            -->
                    <?php
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
    <!-- add footer to the page -->
    <script type="text/javascript" src="\ezolar\public\js\chat.js"></script>
    </div>
    <div class="f">
        <?php
        require_once(__ROOT__ . '\app\views\Includes\footer.php');
        ?>
    </div>
</body>

</html>