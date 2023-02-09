<?php
// define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__.'/app/views/Includes/header.php');
require_once(__ROOT__.'/app/views/Includes/navbar.php');
require_once(__ROOT__.'/app/views/Includes/footer.php');

$calendar = new Calendar();
$calendar->setYear($_SESSION['row']['year']);
$calendar->setMonth($_SESSION['row']['mon']);

$calendar->create();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\salesperson.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\delivery-schedule.css">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <title>My Projects</title>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-heading">
        <b>Salesperson Dashboard</b>
    </div>
    <div class="sidebar-link-container-group">
        <div class="sidebar-link-container-top">
            <a href=""><div class="sidebar-link-container">
                    Assigned Projects
                </div></a>
            <a href="/ezolar/Inquiry/viewSalesperson">
                <div class="sidebar-link-container">
                    Inquiries
                </div>
            </a>
            <div class="sidebar-link-container-selected">
                Inspection Schedule
            </div>
            <div class="sidebar-link-container">
                Delivery Schedule
            </div>
            <div class="sidebar-link-container">
                Engineers & Contractors
            </div>
        </div>

        <div class="sidebar-link-container-bottom">
            <a href=""><div class="sidebar-link-container">
                    Profile
                </div></a>
            <div class="sidebar-link-container">
                Settings
            </div>
        </div>
    </div>
</div>
<div class="common-main-container">
        <table class="calendar-table">
            <tr>
                <?php foreach($calendar->getWeekDays() as $dayName){
                    echo '<th class="calendar-th">'.$dayName.'</th>';
                };?>
            </tr>
            <?php foreach ($calendar->getweeks() as $week){
                echo '<tr>';
                foreach ($week as $dayNo){
                    echo '<td class="calendar-td">'.$dayNo.'</td>';
                }
                echo '</tr>';
            }?>
        </table>
    </div>
</body>
</html>

