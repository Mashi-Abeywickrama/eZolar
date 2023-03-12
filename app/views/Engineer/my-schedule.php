<?php
    //  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
    require_once(__ROOT__.'/app/views/Includes/header.php');
    require_once(__ROOT__.'/app/views/Includes/navbar.php');
    require_once(__ROOT__.'/app/views/Includes/footer.php');
    require(__ROOT__.'\app\libraries\Calendar.php');

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
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <link rel="stylesheet" href="\ezolar\public\css\engineer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\engineer.schedule.css">
    <title>My Projects</title>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-heading">
            <b>Engineer Dashboard</b>
        </div>
        <div class="sidebar-link-container-group">
            <div class="sidebar-link-container-top">
                <a class="sidebar-anchor" href="/ezolar/EngineerProject"><div class="sidebar-link-container">
                    Assigned Projects
                </div></a>
                <a class="sidebar-anchor" href="/ezolar/EngineerSchedule"><div class="sidebar-link-container-selected">
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