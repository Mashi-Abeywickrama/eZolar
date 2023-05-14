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
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\salesperson.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\salesperson\inquiries.css">
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
            <a href="<?=URLROOT?>/SalespersonReports"><div class="box9">
            Reports
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
                <img src="\ezolar\public\img\customer\Inquiry.png" alt="Inquiry">
                </a>
            </div>
            <div class="common-main-txt">
                Inquiries
            </div>
        </div>

    </div>
    <div class="inquiry-list-container">

        <div class="all-inquiry-list-container">

            <div class="category-container">
                <div class="category-btn" id="all-inquiry-btn">All</div>
                <div class="category-btn" id="general-inquiry-btn">General</div>
                <div class="category-btn" id="project-inquiry-btn">Project</div>
                <div class="category-btn" id="troubleshoot-inquiry-btn">Troubleshoot</div>
            </div>

            <!-- Inquiry Type : All -->
            <div class="assigned-inquiry-list" id="all-inquiries">

                <div class="inquiry-list-topic">
                    New Inquiries
                </div>

                <?php
                
                $count = 0;
                $results = $_SESSION['rowsNew'];
                foreach($results as $rowNew){
                    $count +=1;
                    echo '<div class="inquiry-box-new">
                            <div class="inquiry-text-container">

                                <div class="inquiry-text-container-inner">
                                    <div class="inquiry-text-no">Type : ' .  $rowNew -> type . '</div>
                                    <div class="inquiry-text-name"><b>Topic : ' . $rowNew -> topic . '</b></div>
                                </div>
                            </div>
                            <div class="inquiry-details-btn-container" >
                        
                                <a href="/ezolar/Inquiry/viewSalespersonInquiry/'.$rowNew -> inquiryID.'">
                                    <div class="inquiry-details-btn">
                                        <div class="inquiry-details-btn-text">Respond</div>
                                    </div>
                                </a>
                            </div>
                            </div>';
                }
                if($count == 0){
                    echo '<div class="no-inquiry">No Inquiries here</div>';
                }
                ?>

                <div class="new-inquiry-list-container">
                        <div class="inquiry-list-topic">
                            Ongoing Inquiries
                        </div>
                        <?php
                        $count = 0;
                        $results = $_SESSION['rows'];
                        foreach($results as $row){
                            $count += 1;
                        echo '<div class="inquiry-box">
                                    <div class="inquiry-text-container">
                                        <div class="inquiry-text-container-inner">
                                            <div class="inquiry-text-no">Type : ' .  $row -> type . '</div>
                                            <div class="inquiry-text-name"><b>Topic : ' . $row -> topic . '</b></div>
                                        </div>
                                    </div>
                                    <div class="inquiry-details-btn-container" >
                                
                                        <a href="/ezolar/Inquiry/viewSalespersonInquiry/'.$row -> inquiryID.'">
                                            <div class="inquiry-details-btn">
                                                <div class="inquiry-details-btn-text">Respond</div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                </div>';
                        }                    
                        if($count == 0){
                            echo '<div class="no-inquiry">No Inquiries here</div>';
                        }
                        ?>
                    </div>


            </div>

            <!-- Inquiry Type : General -->

            <div class="assigned-inquiry-list" id="general-inquiries">

                <div class="inquiry-list-topic">
                    New Inquiries
                </div>

                <?php
                $count = 0;
                $results = $_SESSION['rowsNew'];
                foreach($results as $rowNew){
                    if ($rowNew -> type == 'General'){
                        $count += 1;
                    echo '<div class="inquiry-box-new">
                            <div class="inquiry-text-container">

                                <div class="inquiry-text-container-inner">
                                    <div class="inquiry-text-no">Type : ' .  $rowNew -> type . '</div>
                                    <div class="inquiry-text-name"><b>Topic : ' . $rowNew -> topic . '</b></div>
                                </div>
                            </div>
                            <div class="inquiry-details-btn-container" >
                        
                                <a href="/ezolar/Inquiry/viewSalespersonInquiry/'.$rowNew -> inquiryID.'">
                                    <div class="inquiry-details-btn">
                                        <div class="inquiry-details-btn-text">Respond</div>
                                    </div>
                                </a>
                            </div>
                            </div>';
                    }}
                    if($count == 0){
                        echo '<div class="no-inquiry">No Inquiries here</div>';
                    }
                    ?>

                    <div class="new-inquiry-list-container">
                        <div class="inquiry-list-topic">
                            Ongoing Inquiries
                        </div>
                        <?php
                        $count = 0;
                        $results = $_SESSION['rows'];
                        foreach($results as $row){
                            if ($row -> type == 'General'){
                            $count += 1;
                        echo '<div class="inquiry-box">
                                    <div class="inquiry-text-container">
                                        <div class="inquiry-text-container-inner">
                                            <div class="inquiry-text-no">Type : ' .  $row -> type . '</div>
                                            <div class="inquiry-text-name"><b>Topic : ' . $row -> topic . '</b></div>
                                        </div>
                                    </div>
                                    <div class="inquiry-details-btn-container" >
                                
                                        <a href="/ezolar/Inquiry/viewSalespersonInquiry/'.$row -> inquiryID.'">
                                            <div class="inquiry-details-btn">
                                                <div class="inquiry-details-btn-text">Respond</div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                </div>';
                        }}if($count == 0){
                            echo '<div class="no-inquiry">No Inquiries here</div>';
                        }
                        ?>
                    </div>
                </div>



            <!-- Inquiry Type : Project -->

            <div class="assigned-inquiry-list" id="project-inquiries">

                <div class="inquiry-list-topic">
                    New Inquiries
                </div>

                <?php
                $count = 0;
                $results = $_SESSION['rowsNew'];
                foreach($results as $rowNew){
                    if ($rowNew -> type == 'Project'){
                        $count += 1;
                    echo '<div class="inquiry-box-new">
                            <div class="inquiry-text-container">

                                <div class="inquiry-text-container-inner">
                                    <div class="inquiry-text-no">Type : ' .  $rowNew -> type . '</div>
                                    <div class="inquiry-text-name"><b>Topic : ' . $rowNew -> topic . '</b></div>
                                </div>
                            </div>
                            <div class="inquiry-details-btn-container" >
                        
                                <a href="/ezolar/Inquiry/viewSalespersonInquiry/'.$rowNew -> inquiryID.'">
                                    <div class="inquiry-details-btn">
                                        <div class="inquiry-details-btn-text">Respond</div>
                                    </div>
                                </a>
                            </div>
                            </div>';
                    }}
                    if($count == 0){
                        echo '<div class="no-inquiry">No Inquiries here</div>';
                    }
                    ?>

                    <div class="new-inquiry-list-container">
                        <div class="inquiry-list-topic">
                            Ongoing Inquiries
                        </div>
                        <?php
                        $count = 0;
                        $results = $_SESSION['rows'];
                        foreach($results as $row){
                            if ($row -> type == 'Project'){
                                $count += 1;
                        echo '<div class="inquiry-box">
                                    <div class="inquiry-text-container">
                                        <div class="inquiry-text-container-inner">
                                            <div class="inquiry-text-no">Type : ' .  $row -> type . '</div>
                                            <div class="inquiry-text-name"><b>Topic : ' . $row -> topic . '</b></div>
                                        </div>
                                    </div>
                                    <div class="inquiry-details-btn-container" >
                                
                                        <a href="/ezolar/Inquiry/viewSalespersonInquiry/'.$row -> inquiryID.'">
                                            <div class="inquiry-details-btn">
                                                <div class="inquiry-details-btn-text">Respond</div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                </div>';
                        }}
                        if($count == 0){
                            echo '<div class="no-inquiry">No Inquiries here</div>';
                        }
                        ?>
                    </div>
                </div>


            <!-- Inquiry Type : Troubleshoot -->

            <div class="assigned-inquiry-list" id="troubleshoot-inquiries">

                <div class="inquiry-list-topic">
                    New Inquiries
                </div>

                <?php
                $count = 0;
                $results = $_SESSION['rowsNew'];
                    foreach($results as $rowNew){
                        if ($rowNew -> type == 'Troubleshoot'){
                            $count += 1;
                        echo '<div class="inquiry-box-new">
                                <div class="inquiry-text-container">

                                    <div class="inquiry-text-container-inner">
                                        <div class="inquiry-text-no">Type : ' .  $rowNew -> type . '</div>
                                        <div class="inquiry-text-name"><b>Topic : ' . $rowNew -> topic . '</b></div>
                                    </div>
                                </div>
                                <div class="inquiry-details-btn-container" >
                            
                                    <a href="/ezolar/Inquiry/viewSalespersonInquiry/'.$rowNew -> inquiryID.'">
                                        <div class="inquiry-details-btn">
                                            <div class="inquiry-details-btn-text">Respond</div>
                                        </div>
                                    </a>
                                </div>
                                </div>';
                    }}
                    if($count == 0){
                        echo '<div class="no-inquiry">No Inquiries here</div>';
                    }
                    ?>

                    <div class="new-inquiry-list-container">
                        <div class="inquiry-list-topic">
                            Ongoing Inquiries
                        </div>
                        <?php
                        $count = 0;
                        $results = $_SESSION['rows'];
                        foreach($results as $row){
                            if ($row -> type == 'Troubleshoot'){
                                $count += 1;
                        echo '<div class="inquiry-box">
                                    <div class="inquiry-text-container">
                                        <div class="inquiry-text-container-inner">
                                            <div class="inquiry-text-no">Type : ' .  $row -> type . '</div>
                                            <div class="inquiry-text-name"><b>Topic : ' . $row -> topic . '</b></div>
                                        </div>
                                    </div>
                                    <div class="inquiry-details-btn-container" >
                                
                                        <a href="/ezolar/Inquiry/viewSalespersonInquiry/'.$row -> inquiryID.'">
                                            <div class="inquiry-details-btn">
                                                <div class="inquiry-details-btn-text">Respond</div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                </div>';
                        }}
                        if($count == 0){
                            echo '<div class="no-inquiry">No Inquiries here</div>';
                        }
                        ?>
                    </div>
                </div>

            
            
            </div>



    </div>

</div>
</div>
<?php unset($_SESSION['rows'],$_SESSION['rowsNew'])?>
<div class = "f">
<?php
$this->view('Includes/footer', $data);
?>
</div>
</body>
<script type="text/javascript" src="\ezolar\public\js\inquiry.js"></script>
<script>
    var all_inquiry_btn = document.getElementById("all-inquiry-btn");
    var general_inquiry_btn = document.getElementById("general-inquiry-btn");
    var project_inquiry_btn = document.getElementById("project-inquiry-btn");
    var troubleshoot_inquiry_btn = document.getElementById("troubleshoot-inquiry-btn");

    var all_inquiries = document.getElementById("all-inquiries");
    var general_inquiries = document.getElementById("general-inquiries");
    var project_inquiries = document.getElementById("project-inquiries");
    var troubleshoot_inquiries = document.getElementById("troubleshoot-inquiries");
    // var finished_projects = document.getElementById("finished-projects");
    var inquiry_list = document.getElementsByClassName("assigned-inquiry-list");
    Array.from(inquiry_list).forEach(hideList);
    all_inquiry_btn.classList.add('select');
    all_inquiries.classList.remove('hide');
    all_inquiries.classList.add('select');

    function hideList(list){
        list.classList.remove('select');
        list.classList.add('hide');
    }

    function selectList(list){
        Array.from(inquiry_list).forEach(hideList);
        list.classList.remove('hide');
        list.classList.add('select');
    }


    all_inquiry_btn.addEventListener('click', function(btn) {
        btn.target.classList.add('select');
        general_inquiry_btn.classList.remove('select');
        project_inquiry_btn.classList.remove('select');
        troubleshoot_inquiry_btn.classList.remove('select');
        selectList(all_inquiries);
    });

    general_inquiry_btn.addEventListener('click', function(btn) {
        btn.target.classList.add('select');
        all_inquiry_btn.classList.remove('select');
        project_inquiry_btn.classList.remove('select');
        troubleshoot_inquiry_btn.classList.remove('select');
        selectList(general_inquiries);
    });

    project_inquiry_btn.addEventListener('click', function(btn) {
        btn.target.classList.add('select');
        all_inquiry_btn.classList.remove('select');
        general_inquiry_btn.classList.remove('select');
        troubleshoot_inquiry_btn.classList.remove('select');
        selectList(project_inquiries);
    });

    troubleshoot_inquiry_btn.addEventListener('click', function(btn) {
        btn.target.classList.add('select');
        all_inquiry_btn.classList.remove('select');
        project_inquiry_btn.classList.remove('select');
        general_inquiry_btn.classList.remove('select');
        selectList(troubleshoot_inquiries);
    });
</script>
</html>

