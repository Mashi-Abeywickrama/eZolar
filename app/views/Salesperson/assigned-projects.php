<?php
//  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
// require_once(__ROOT__.'\app\views\Includes\header.php');
require_once(__ROOT__.'\app\views\Customer\navbar.php');
// require_once(__ROOT__.'\app\views\Includes\footer.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\salesperson.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\assigned-projects.css">
    <title>My Projects</title>
</head>
<body>

<div class="body-container">
    <div class="left-panel">
        <a href="<?=URLROOT?>/user/dashboard"><div class ="box1">
            Salesperson Dashboard
        </div></a>
        <div class="rest">
            <div class="rest-top">
            <a href="<?=URLROOT?>/SalespersonProject"><div class="box7">
                    Assigned Projects
                </div></a>
            <a href="<?=URLROOT?>/Inquiry/getSalespersonInquiries"><div class="box2">
                    Inquiries
            </div></a>
            <a href="<?=URLROOT?>/SalespersonSchedules/InspectionSchedule"><div class="box3">
                Inspection Schedule
            </div></a>
            <a href="<?=URLROOT?>/SalespersonSchedules/DeliverySchedule"><div class="box4">
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
    <div class="dashboard-common-main-topic">
        <div class = "common-main-topic-left">
            <div class="common-main-left-img">
                <a href=”#” “text-decoration: none”>
                    <img src="\ezolar\public\img\salesperson\assignedProjects.png" alt="project">
                </a>
            </div>
            <div class="common-main-txt">
                Assigned Projects
            </div>
        </div>

    </div>
    <div class="project-list-container">
        <div class="category-container">
            <div class="category-btn" id="priority-btn">Priority Projects</div>
            <div class="category-btn" id="ongoing-btn">Ongoing Projects</div>
            <div class="category-btn" id="finished-btn">Finished Projects</div>
        </div>
        <div class="assigned-project-list-container" id="priority-projects">
            <?php
            $results = $_SESSION['rows']['priority'];
            if (count($results)<=0){
                echo '<div class="no-projects-text">No Projects here</div>';
            } else {
                foreach($results as $row){
                    if ($row -> Salesperson_Employee_empID != NULL)
                    echo '<div class="project-box">
                                <div class="project-text-container">
                                    <div class="project-text-container-inner">
                                        <div class="project-text-no">Project No: ' .  $row -> projectID . '</div>
                                        <div class="project-text-name"><b>Status : ' . $row -> status . '</b></div>
                                        <div class="project-text-no">Site Location: ' .  $row -> siteAddress . '</div>
                                    </div>
                                </div>
                                <div class="project-details-btn-container">
                                    <a href="/ezolar/SalespersonProject/projectDetailsPage/'.$row -> projectID.'">
                                        <div class="project-details-btn">
                                            <div class="project-details-btn-text">More Info</div>
                                        </div>
                                    </a>
                                </div>
                            </div>';
                }
            }
            ?>
        </div>
        <div class="assigned-project-list-container" id="ongoing-projects">
            <?php
            $results = $_SESSION['rows']['ongoing'];
            if (count($results)<=0){
                echo '<div class="no-projects-text">No Projects here</div>';
            } else {
                foreach($results as $row){
                    if ($row -> Salesperson_Employee_empID != NULL)
                    echo '<div class="project-box">
                                <div class="project-text-container">
                                    <div class="project-text-container-inner">
                                        <div class="project-text-no">Project No: ' .  $row -> projectID . '</div>
                                        <div class="project-text-name"><b>Status : ' . $row -> status . '</b></div>
                                        <div class="project-text-no">Site Location: ' .  $row -> siteAddress . '</div>
                                    </div>
                                </div>
                                <div class="project-details-btn-container">
                                    <a href="/ezolar/SalespersonProject/projectDetailsPage/'.$row -> projectID.'">
                                        <div class="project-details-btn">
                                            <div class="project-details-btn-text">More Info</div>
                                        </div>
                                    </a>
                                </div>
                            </div>';
                }
            }
            ?>
        </div>
        <div class="assigned-project-list-container" id="finished-projects">
            <?php
            $results = $_SESSION['rows']['finished'];
            if (count($results)<=0){
                echo '<div class="no-projects-text">No Projects here</div>';
            } else {
                foreach($results as $row){
                    if ($row -> Salesperson_Employee_empID != NULL)
                    echo '<div class="project-box">
                                <div class="project-text-container">
                                    <div class="project-text-container-inner">
                                        <div class="project-text-no">Project No: ' .  $row -> projectID . '</div>
                                        <div class="project-text-name"><b>Status : ' . $row -> status . '</b></div>
                                        <div class="project-text-no">Site Location: ' .  $row -> siteAddress . '</div>
                                    </div>
                                </div>
                                <div class="project-details-btn-container">
                                    <a href="/ezolar/SalespersonProject/projectDetailsPage/'.$row -> projectID.'">
                                        <div class="project-details-btn">
                                            <div class="project-details-btn-text">More Info</div>
                                        </div>
                                    </a>
                                </div>
                            </div>';
                }
            }
            ?>
        </div>
    </div>
</div>
        </div>
<div class = "f">
<?php
$this->view('Includes/footer', $data);
?>
</div>
<script>
    var priority_btn = document.getElementById("priority-btn");
    var ongoing_btn = document.getElementById("ongoing-btn");
    var finished_btn = document.getElementById("finished-btn");

    var priority_projects = document.getElementById("priority-projects");
    var ongoing_projects = document.getElementById("ongoing-projects");
    var finished_projects = document.getElementById("finished-projects");
    var all_projects = document.getElementsByClassName("assigned-project-list-container");
    Array.from(all_projects).forEach(hideList);
    priority_btn.classList.add('select');
    priority_projects.classList.remove('hide');
    priority_projects.classList.add('select');

    function hideList(list){
        list.classList.remove('select');
        list.classList.add('hide');
    }

    function selectList(list){
        Array.from(all_projects).forEach(hideList);
        list.classList.remove('hide');
        list.classList.add('select');
    }


    priority_btn.addEventListener('click', function(btn) {
        btn.target.classList.add('select');
        ongoing_btn.classList.remove('select');
        finished_btn.classList.remove('select');
        selectList(priority_projects);
    });
    ongoing_btn.addEventListener('click', function(btn) {
        btn.target.classList.add('select');
        priority_btn.classList.remove('select');
        finished_btn.classList.remove('select');
        selectList(ongoing_projects);
    });
    finished_btn.addEventListener('click', function(btn) {
        btn.target.classList.add('select');
        priority_btn.classList.remove('select');
        ongoing_btn.classList.remove('select');
        selectList(finished_projects);
    })
</script>
</body>

</html>

