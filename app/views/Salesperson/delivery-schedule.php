<?php
//  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
//require_once(__ROOT__.'/app/views/Includes/header.php');
//require_once(__ROOT__.'/app/views/Includes/navbar.php');
//require_once(__ROOT__.'/app/views/Includes/footer.php');
require_once(__ROOT__.'\app\views\Customer\navbar.php');
require(__ROOT__.'/app/libraries/Calendar.php');

$calendar = new Calendar();
$calendar->setYear($_SESSION['row']['year']);
$calendar->setMonth($_SESSION['row']['mon']);

$calendar->create();

$JSarrayString = "[";
foreach ($_SESSION['rows'] as $S_item){
    //item = [date id, schedulte id, schedule type, project ID, site address]
    $item = "[";
    $item .= '"date-'.substr($S_item->date,0,4).'-'.substr($S_item->date,5,2).'-'.substr($S_item->date,8,2).'",';
    $item .= '"'.$S_item->scheduleID.'",';
    $item .= '"'.$S_item->type.'",';
    $item .= '"'.$S_item->Project_projectID.'",';
    $item .= '"'.$S_item->siteAddress.'",';
    $item .= '"'.$S_item->name.'",';
    $item .= '"'.$S_item->isCompleted.'"]';

    $JSarrayString .= $item.',';
}
$JSarrayString = substr_replace($JSarrayString, "]", -1)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\salesperson.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\engineer.schedule.css">
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
            <a href="<?=URLROOT?>/SalespersonSchedules/DeliverySchedule"><div class="box4" style="color: #ffffff;background-color: #0b2f64;">
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
            <div class="clandar-header-container">
            <span class="calendar-header-text"><?php echo $calendar->getMonthName().' '.$calendar->getYear();
                $nextMonth = $calendar->getNextMonth();
                $nextMonthLink = '/ezolar/SalespersonSchedules/DeliveryBrowse/'.$nextMonth[1].'/'.$nextMonth[0];
                $prevMonth = $calendar->getPrevMonth();
                $prevMonthLink = '/ezolar/SalespersonSchedules/DeliveryBrowse/'.$prevMonth[1].'/'.$prevMonth[0];
                ?></span>
                <div class="calendar-month-btn-container">
                    <a href="<?php echo $prevMonthLink?>"><button class="calendar-month-btn"><img src="\ezolar\public\img\engineer\Back.png" alt="Back" class="calendar-month-btn-img"></button></a>
                    <a href="<?php echo $nextMonthLink?>"><button class="calendar-month-btn"><img src="\ezolar\public\img\engineer\Forward.png" alt="Back" class="calendar-month-btn-img"></button></a>
                </div>
            </div>
            <table class="calendar-table">
                <tr>
                    <?php foreach($calendar->getWeekDays() as $dayName){
                        echo '<th class="calendar-th">'.$dayName.'</th>';
                    };?>
                </tr>
                <?php
                $dateIDpref = 'date-'.$calendar->getYear().'-'.str_pad(strval($calendar->getMonth()),2,'0',STR_PAD_LEFT);
                foreach ($calendar->getweeks() as $week){
                    echo '<tr>';
                    foreach ($week as $dayNo){
                        echo '<td class="calendar-td"><div class="calendar-date-container">'.$dayNo.'<div class="calendar-event-list-container" id="'.$dateIDpref.'-'.str_pad(strval($dayNo),2,'0',STR_PAD_LEFT).'"></div></div></td>';
                    }
                    echo '</tr>';
                }?>

                <script>
                    var schedule_items = <?php echo $JSarrayString;?>;
                    schedule_items.forEach(displayEvent);

                    function displayEvent(item){
                        var id = item[0];
                        var element = document.getElementById(id);
                        console.log(element);
                        var event_list = element.innerHTML;
                        console.log("event:" + event_list);
                        var className = "calendar-event-container";
                        var empName = item[5]
                        console.log(item[6]);
                        if (item[6] == 1){
                            // completed inspections
                            className += ' event-inspection';
                        }
                        else {
                            // Not completed inspections
                            className += ' event-delivery';
                        }
                        var new_event = "<a href=\"/ezolar/EngineerProject/projectDetailsPage/"+item[3]+"\" class=\"calendar-event-anchor\"><div class=\""+className+"\">"+ item[3] + "<br>" + item[5].toUpperCase() +"</div></a>";

                        event_list = event_list + new_event;
                        element.innerHTML = event_list;
                        console.log("later:" + event_list);
                    }
                </script>
            </table>
        </div>
    </div>
</div>
<div class="f">
    <?php
    require_once(__ROOT__.'/app/views/Includes/footer.php');
    ?>
</div>
</body>
</html>