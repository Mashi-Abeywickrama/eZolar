<?php
//     define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__.'/app/views/Includes/header.php');
require_once(__ROOT__.'/app/views/Includes/navbar.php');
require_once(__ROOT__.'/app/views/Includes/footer.php');
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
<div class="sidebar">
    <div class="sidebar-heading">
        <b>Admin Dashboard</b>
    </div>
    <div class="sidebar-link-container-group">
        <div class="sidebar-link-container-top">
            <a href="/ezolar/Employee"><div class="sidebar-link-container">
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
            <a href="/ezolar/Statistics/">
                <div class="sidebar-link-container-selected">
                    Reports
                </div>
            </a>
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
<!--    --><?php //print_r($_SESSION) ;?>
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
        data-packages="<?php echo htmlspecialchars(json_encode($_SESSION['packages-sold'])); ?>"
        data-inspection="<?php echo htmlspecialchars(json_encode($_SESSION['inspection'])); ?>"
        data-delivery="<?php echo htmlspecialchars(json_encode($_SESSION['delivery'])); ?>">
<?php //unset($_SESSION['labels'],$_SESSION['data'],$_SESSION['packages-sold'],$_SESSION['inspection'],$_SESSION['delivery'])?>
</script>
</body>
</html>
