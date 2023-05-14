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
    <link rel="stylesheet" href="\ezolar\public\css\engineer.projects.css">
    <title>My Projects</title>
</head>
<body>
<?php require_once(__ROOT__.'/app/views/popupList/changeEmployee.php');?>
<div class="body-container">
    <div class="left-panel">
        <a href="<?=URLROOT?>/user/dashboard"><div class ="box1">
            Admin Dashboard
        </div></a>
        <div class="rest">
            <div class="rest-top">
            <a href="<?=URLROOT?>/Employee"><div class="box7" style="color: #0b2f64;background-color: #ffffff;">
                    Employees
            </div></a>
            <a href="<?=URLROOT?>/AdminProject"><div class="box9" style="color: #ffffff;background-color: #0b2f64;">
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
        <div class="dashboard-common-main-topic" style ="margin-left: 0; margin-top: 0; justify-content:start; align-items:center;">
            <div class="common-main-left-img">
                <a href="<?=URLROOT?>/AdminProject" style= “text-decoration: none”>
                    <img src="\ezolar\public\img\storekeeper\Back.png" alt="Back Button">
                </a>
            </div>
            <div class="common-main-txt">
                Project : <?php echo strtoupper($_SESSION['row']->projectID);?>
            </div>
            
        </div>

        <div class="employee-cards-container">

            <div class="card">
                <?php 
                    if((count($_SESSION['rows']['salesperson'])) == 0){
                        echo '
                        <img src="\ezolar\public\img\user-pics\defaultimg.png" alt="profile-img" style="width:100%; opacity:0.3;">
                        <div class="container">
                        <div class="title">Salesperson</div>
                        <p class="not-assigned">Not Assigned</p>
                        </div>' ;
                    }
                    else{
                        echo '          
                        <img src="\ezolar\public\img\user-pics\defaultimg.png" alt="profile-img" style="width:100%">
                        <div class="container">
                        <div class="title">Salesperson</div>
                            <p>' .strtoupper($_SESSION['rows']['salesperson'][0]->name). '</p>
                            <p class="emp-id"> Employee ID : ' .($_SESSION['rows']['salesperson'][0]->empID). '</p>
                        </div>
                        <div class="change-btn-container">
                            <div class="change-sales-btn" id="change-sales-btn">change</div>
                        </div>
                        ';
                        
                    }
                ?>
            </div>

            <div class="card">
                <?php 
                    if((count($_SESSION['rows']['engineer'])) == 0){
                        echo '
                        <img src="\ezolar\public\img\user-pics\defaultimg.png" alt="profile-img" style="width:100%; opacity:0.3;">
                        <div class="container">
                        <div class="title">Engineer</div>
                        <p class="not-assigned">Not Assigned</p>
                        </div>' ;
                    }
                    else{
                        echo '          
                        <img src="\ezolar\public\img\user-pics\defaultimg.png" alt="profile-img" style="width:100%">
                        <div class="container">
                        <div class="title">Engineer</div>
                            <p>' .strtoupper($_SESSION['rows']['engineer'][0]->name). '</p>
                            <p class="emp-id"> Employee ID : ' .$_SESSION['rows']['engineer'][0]->empID. '</p>
                        </div>
                        <div class="change-btn-container">
                            <div class="change-eng-btn" id="change-eng-btn">change</div>
                        </div>
                        ';
                        
                    }
                ?>
            </div>

            <div class="card">
                <?php 
                    if((count($_SESSION['rows']['contractor'])) == 0){
                        echo '
                        <img src="\ezolar\public\img\user-pics\defaultimg.png" alt="profile-img" style="width:100%; opacity:0.3;">
                        <div class="container">
                        <div class="title">Contactor</div>
                        <p class="not-assigned">Not Assigned</p>
                        </div>
                        ' ;
                    }
                    else{
                        echo '          
                        <img src="\ezolar\public\img\user-pics\defaultimg.png" alt="profile-img" style="width:100%">
                        <div class="container">
                        <div class="title">Contractor</div>
                            <p>' .strtoupper($_SESSION['rows']['contractor'][0]->name). '</p>
                            <p class="emp-id"> Employee ID : ' .$_SESSION['rows']['contractor'][0]->empID. '</p>
                        </div>
                        <div class="change-btn-container">
                            <div class="change-contr-btn" id="change-contr-btn">change</div>
                        </div>
                    ';
                        
                    }
                ?>
            </div>

            <div class="del-btn">delete</div>

        </div>
        
    </div>  
    </div>
<div class="f">
    <?php 
      $this->view('Includes/footer', $data);
      unset($_SESSION['rows'],$_SESSION['employees'],$_SESSION['projectID']);
    ?>
</div>

<script>

    var change_sales_btn = document.getElementById('change-sales-btn');
    var change_eng_btn = document.getElementById('change-eng-btn');
    var change_contr_btn = document.getElementById('change-contr-btn');
    var text_box = document.getElementById('text');
    var yes_btn = document.getElementById('yes-btn');
    var no_btn = document.getElementById('no-btn');


    change_sales_btn.addEventListener('click', function()
    {
        document.getElementById("sp-pop").style.display="block";
    });

    change_eng_btn.addEventListener('click', function()
    {
        document.getElementById("eng-pop").style.display="block";
    });

    change_contr_btn.addEventListener('click', function()
    {
        document.getElementById("contr-pop").style.display="block";
    });





    
</script>

</body>
</html>