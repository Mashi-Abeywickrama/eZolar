<?php
     require_once(__ROOT__.'\app\views\Customer\navbar.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\ezolar\public\css\style.css">
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\customer.project.css">
    <title>Document</title>
</head>
<body>
<div class="body-container">
    <div class="left-panel">
        <a href="<?=URLROOT?>/user/dashboard"><div class ="box1">
            Customer Dashboard
        </div></a>
        <div class="rest">
            <div class="rest-top">
            <a href="<?=URLROOT?>#"><div class="box7">
                    Packages
                </div></a>
            <a href="<?=URLROOT?>/project"><div class="box2">
                    My Projects
                </div></a>
                <a href="<?=URLROOT?>/inquiry"><div class="box3">
                    Inquiries
                </div></a>
                <a href="<?=URLROOT?>/transaction"><div class="box4">
                    Transactions
                </div></a>
            </div>
            <div class="rest-bottom">
            <a href="<?=URLROOT?>/user/profile"><div class="box5">
                    Profile
                </div></a>
                <a href="<?=URLROOT?>/customersettings"><div class="box6">
                    Settings
                </div></a>
            </div>
        </div>
    </div>
    <?php
        require_once(__ROOT__.'\app\views\popupList\newprojectPopup.php');
        if (isset($_POST['sub'])) {
            echo '
            <script>
                document.getElementById('."'id02'".').style.display='."'block'".';
            </script>
            
            ';
        }
    ?>
    <div class="common-main-container">
        <div class="dashboard-common-heading-container">
            <div class="dashboard-common-heading-back-btn">
                <a href="<?=URLROOT?>/project" “text-decoration: none”>
                    <img src="\ezolar\public\img\admin\back.png">
                </a>
            </div>
            <div class="dashboard-common-heading-text">
                <b>New Project</b>
            </div>

        </div>
        <div class="budget-cal-container">
            <div class="budget-cal-text">  
            "Discover the potential savings of a solar panel system for your home with our free budget estimation tool.
             Simply input your monthly power consumption to receive an instant estimate of the cost of a solar panel system that fits your needs.
             No Commitment Required! Click the button below!"
            </div>
            <div class="budget-btn-container">
                <div class="budget-cal-btn">
                    <div class="budget-cal-btn-txt">
                        Calculate Budget
                    </div>
                    <div class="budget-cal-btn-img-c">
                        <img class="budget-cal-btn-img" src="\ezolar\public\img\Cal.png" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-acc-detail-container">
            <div class="form-container-p">
                <form name="Reset Form" class="new-p-form" action="requestProject" method="POST" enctype="multipart/form-data">
                    <div class="err">Site Location:
                        <div class = "err-group">
                            <span class="star">*</span>
                            <span class="err-box" id="location-err"></span>
                        </div>
                    </div>
                    <input class="p-in" name="location" id="location" type="text" placeholder="no.123,someplace" required>
                    <div class="err">Contact number:
                        <div class = "err group">
                            <span class="star">*</span>
                            <span class="err-box" id="pwd-err"></span>
                        </div>
                    </div>
                    <input class="p-in" name="mobile" id="mobile" type="text" placeholder="insert Contact number" required>

                    <div class="err">Upload payment reciept:
                        <div class = "err-group">
                            <span class="star">*</span>
                            <span class="err-box" id="img-err"></span>
                        </div>
                        
                    </div>
                    <input type="file" class="fileToUpload"  id="file-input" name="fileToUpload" onchange="loadFile(this)" required>
                    <div class="p"><img class="img-slip" scr="" id="output" width="200"/></div>
                        <script>
                            function loadFile(input) {
                                if(input.files && input.files[0] ) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        document.getElementById("output").src = e.target.result;
                                    };
                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                        </script>
                    <div class = "group" >
                        <button class="cancel-btn" type="cancel" name="cancel">Cancel</button>
                        <button class="submit-btn" type="submit" name="sub" onclick="document.getElementById('id02').style.display='block'" > Submit </button>
                    </div>
                </form>
            </div>
            <div class = "acc-detail-box">
                        <div class="acc-details-topic">
                            Account Details
                        </div>
                        <div class="details-wrapper">
                            <div class="details-box">
                                <div class="t">
                                    Account Number:
                                </div>
                                <div class="d">
                                    072-2-001-2-008235
                                </div>
                            </div>
                            <div class="details-box">
                                <div class="t">
                                    Benificiary Name:
                                </div>
                                <div class="d">
                                    Team eZolar
                                </div>
                            </div>
                            <div class="details-box">
                                <div class="t">
                                    Bank Name:
                                </div>
                                <div class="d">
                                    People's Bank
                                </div>
                            </div>
                            <div class="details-box">
                                <div class="t">
                                    Branch Name:
                                </div>
                                <div class="d">
                                    Ambalantota
                                </div>
                            </div>
                            <div class="details-box">
                                <div class="t">
                                    Purpose:
                                </div>
                                <div class="d">
                                    Inspection payment
                                </div>
                            </div>
                            <div class="details-box">
                                <div class="t">
                                    Amount:
                                </div>
                                <div class="d">
                                    Rs. 10000.00
                                </div>
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