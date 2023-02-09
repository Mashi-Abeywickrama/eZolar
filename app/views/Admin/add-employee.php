<?php
//     define('__ROOT__', dirname(dirname(dirname(__FILE__))));
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
    <link rel="stylesheet" href="\ezolar\public\css\admin\admin.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\admin\add-employee.css">

    <title>My Projects</title>
</head>
<body>

<div class="sidebar">
        <div class="sidebar-heading">
            <b>Admin Dashboard</b>
        </div>
        <div class="sidebar-link-container-group">
            <div class="sidebar-link-container-top">
                <a href="/ezolar/Employee"><div class="sidebar-link-container-selected">
                    Employees
                </div></a>
                <a href=/ezolar/Package>
                    <div class="sidebar-link-container">
                        Packages
                    </div>
                </a>
                <a href=/ezolar/Product>
                    <div class="sidebar-link-container">
                        Products
                    </div>
                </a>
                <div class="sidebar-link-container">
                    Reports 
                </div>
            </div>

            <div class="sidebar-link-container-bottom">
                <a href="/ezolar/AdminViewProfile"><div class="sidebar-link-container">
                    Profile
                </div>
                <div class="sidebar-link-container">
                    Settings
                </div>
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
                                <option value="engineer">Engineer</option>
                                <option value="salesperson">Salesperson</option>
                                <option value="storekeeper">Storekeeper</option>
                                <option value="contractor">Contractor</option>
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

</body>
</html>