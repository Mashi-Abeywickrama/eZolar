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
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\engineer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\engineer.issuereport.css">
    <title>Add Package</title>
</head>
<body>
<div class="body-container">
    <div class="left-panel">
        <div class="sidebar-heading">
        <a class="sidebar-anchor" href="/ezolar/user/dashboard"><b>Engineer Dashboard</b></a>
        </div>
        <div class="sidebar-link-container-group">
            <div class="sidebar-link-container-top">
                <a class="sidebar-anchor" href="/ezolar/EngineerProject"><div class="sidebar-link-container">
                    Assigned Projects
                </div></a>
                <a class="sidebar-anchor" href="/ezolar/EngineerSchedule"><div class="sidebar-link-container">
                    My Schedule
                </div></a>
                <a class="sidebar-anchor" href="/ezolar/EngineerIssue"><div class="sidebar-link-container-selected">
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
        <div class="dashboard-common-heading-and-background-container">
            <div class="dashboard-common-heading-container">
                <div class="dashboard-common-heading-back-btn">
                    <a href="/ezolar/User/dashboard" “text-decoration: none”>
                        <img src="\ezolar\public\img\storekeeper\Back.png">
                    </a>
                </div>
                <div class="dashboard-common-heading-text">
                    <b>Report an Issue</b>
                </div>
                <div class="dashboard-common-heading-image">
                    <a href=”” “text-decoration: none”>
                        <img src="\ezolar\public\img\engineer\ReportIssue.png" alt="Products-icon">
                    </a>
                </div>
            </div>  
            <div class="form-background">
                <form class="form-container" action="/ezolar/EngineerIssue/newIssue" method="POST">
                    <div class="form-inline">
                        <div class="form-item-container">
                            <div class="form-item-text">
                                From:
                            </div>
                            <input class="form-item-input" name="user-id" id="user-id" type="text" value="<?php
                            $row = $_SESSION['row'];
                            echo $row -> name;?>" disabled>
                        </div>
                        <div class="form-item-container">
                            <div class="form-item-text">
                                Project ID:
                            </div>
                            <select class="form-item-input-dropdown" name="project-id" id="project-id">
                                <option value="NULL" selected> </option>
                                <?php
                                $results = $_SESSION['rows'];
                                foreach($results as $row){
                                    echo '<option value="'.$row ->Project_projectID.'">'.$row -> Project_projectID.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-inline">
                    <div class="form-item-container">
                            <div class="form-item-text">
                                Topic: <span style="color:red;">*</span> <span class="err-box" id="issue-topic-err"></span>
                            </div>
                            <input class="form-item-input" name="issue-topic" id="issue-topic" type="text" required onkeyup="validateTopic()">
                        </div>
                    </div>
                    <div class="form-inline">
                    <div class="form-item-container">
                            <div class="form-item-text">
                                Message: <span style="color:red;">*</span> <span class="err-box" id="issue-mssg-err"></span>
                            </div>
                            <textarea class="form-item-input-large" name="issue-message" id="issue-message" type="text" required onkeyup="validateMessage()"></textarea>
                        </div>
                    </div>
                    <div class="form-inline" style="justify-content:center;">
                        <button class="form-submit-btn" type="submit" onclick="return validateForm()">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
<div class="f">
    <?php 
      $this->view('Includes/footer', $data);
    ?>
</div>
    <script src="\ezolar\public\js\issue_validation.js"></script>
</body>
</html>