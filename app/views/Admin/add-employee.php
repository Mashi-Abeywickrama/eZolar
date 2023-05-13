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
    <link rel="stylesheet" href="\ezolar\public\css\admin\add-employee.css">

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
        <div class="dashboard-common-main-topic">
            <div class="common-main-left-img">
                <a href=”” “text-decoration: none”>
                    <img src="\ezolar\public\img\admin\employees.png" alt="employee-icon">
                </a>
            </div>
            <div class="common-main-txt">
                Add Employee
            </div>
            
            <div class="common-main-right-img">
                <img src="\ezolar\public\img\profile.png" alt="profile">
            </div>   
        </div>


        <div class="form-background">

                <form class="form-container" action="/ezolar/employee/newEmployee" method="POST">
                <div class="form-inline">
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                First Name :
                                <span class="required">*</span>
                                <span class="err-box" id="fname-err"></span>
                            </div>
                            <input class="form-item-input" name="fname" id="fname" type="text" placeholder="Eg: Mashi" required onkeyup="validatefName()" >
                        </div>
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                Last Name :
                                <span class="err-box" id="lname-err"></span>
                            </div>
                            <input class="form-item-input" name="lname" id="lname" type="text" placeholder="Eg: Abeywickrama" onkeyup="validatelName()">
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="form-item-container">
                            <div class="form-item-text">
                                Email :
                                <span class="required">*</span>
                                <span class="err-box" name="emailErr" id="email-err"></span>
                            </div>
                            <input class="form-item-input" name="email" id="email" type="text" placeholder="Eg: mashiAbey@gmail.com" required onkeyup="validateEmail()">
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="form-item-container">
                            <div class="form-item-text">
                                Contact Number
                                <span class="required">*</span>
                                <span class="err-box" name="mobileErr" id="mobile-err"></span>
                            </div>
                            <input class="form-item-input" name="mobile" id="mobile" type="text" placeholder="Eg: 0712345671" required onkeyup="validateTelNo()">
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="form-item-container">
                            <div class="form-item-text">
                                NIC Number
                                <span class="required">*</span>
                                <span class="err-box" id="nic-err"></span>
                            </div>
                            <input class="form-item-input" name="nic" id="nic" type="text" placeholder="199987654V" required onkeyup="validateNIC()">
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                Position :
                                <span class="required">*</span>
                            </div>
                            <select class="form-item-input-dropdown" name="employee-type" id="employee-type" required>
                                <option value="" selected disabled>Select</option>
                                <option value="Engineer">Engineer</option>
                                <option value="Salesperson">Salesperson</option>
                                <option value="Storekeeper">Storekeeper</option>
                                <option value="Contractor">Contractor</option>
                            </select>
                        </div>
                        <div class="form-item-container-half">
                            <div class="form-item-text">
                                Gender :
                            </div>
                            <select class="form-item-input-dropdown" name="gender" id="gender">
                                <option value="" selected disabled>Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <!-- <div class="form-item-container-half">
                            <div class="form-item-text">
                                Gender :
                            </div>
                            <input class="form-item-input" name="gender" id="gender" type="text" placeholder="Not specified">
                        </div> -->
                    </div>

                    <div class="form-inline-button">
                        <div class="cancel-btn">
                            <button class="form-cancel-btn" type="reset" value="reset" onclick="clearErrorMessage()">Cancel</button>
                        </div>
                        <div class="submit-btn">
                            <button type="submit" class="form-submit-btn" onclick="return validateAddEmployee()">Submit</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>

    <script type="text/javascript" src="\ezolar\public\js\validation.js"></script>
    </div>
<div class = "f">
<?php
$this->view('Includes/footer', $data);
?>
</div>
</body>
</html>