<?php
//     define('__ROOT__', dirname(dirname(dirname(__FILE__))));
    // require_once(__ROOT__.'\app\views\Customer\navbar.php');
    require_once(__ROOT__.'/app/views/Customer/navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <link rel="stylesheet" href="\ezolar\public\css\admin\admin.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\admin\statistics.css">
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
            <a href="<?=URLROOT?>/Package"><div class="box2">
                    Packages
            </div></a>
            <a href="<?=URLROOT?>/Product"><div class="box3">
                    Products
            </div></a>
            <a href="<?=URLROOT?>/Statistics/salesPerMonth"><div class="box4">
                    Reports
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
                <a href="/ezolar/Employee/Employees" “text-decoration: none”>
                    <img src="\ezolar\public\img\admin\back.png" alt="back-icon">
                </a>
            </div>
            <div class="dashboard-common-heading-text">
                <b>Reports</b>
            </div>
            <div class="dashboard-common-heading-image">
                <a href=”” “text-decoration: none”>
                    <img src="\ezolar\public\img\admin\employees.png" alt="employees-icon">
                </a>
            </div>

        </div>

        <div class="wrapper">
            <div class="tabs_wrap">
                <ul>
                    <li data-tabs="sales" class="active">Sales</li>
                    <li data-tabs="packages">Packages</li>
                    <li data-tabs="schedules">Schedules</li>
                </ul>
            </div>
        </div>

        <div id="sales" class="sales">
            <div class="item">
                <canvas id="salesPerMonthChart"></canvas>
            </div>
        </div>
        <div id="packages" class="packages">
            <div class="item">
                <canvas id="packagesSoldChart"></canvas>
            </div>
        </div>
        <div id="schedules" class="schedules">
            <div class="item">
                <canvas id="SchedulesPerMonthChart"></canvas>
            </div>
        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript" src="\ezolar\public\js\tabMenu.js"></script>
<script type="text/javascript" src="\ezolar\public\js\statistics.js"
        data-labels="<?php echo htmlspecialchars(json_encode($_SESSION['labels'])); ?>"
        data-data="<?php echo htmlspecialchars(json_encode($_SESSION['data'])); ?>"
        data-previous="<?php echo htmlspecialchars(json_encode($_SESSION['previous-data'])); ?>"
        data-packages="<?php echo htmlspecialchars(json_encode($_SESSION['packages-sold'])); ?>"
        data-inspection="<?php echo htmlspecialchars(json_encode($_SESSION['inspection'])); ?>"
        data-delivery="<?php echo htmlspecialchars(json_encode($_SESSION['delivery'])); ?>">
<?php unset($_SESSION['labels'],$_SESSION['data'],$_SESSION['previous-data'],$_SESSION['packages-sold'],$_SESSION['inspection'],$_SESSION['delivery'])?>
</script>
</div>
<div class = "f">
<?php
$this->view('Includes/footer', $data);
?>
</div>
</body>
</html>
