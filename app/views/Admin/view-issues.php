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
    <link rel="stylesheet" href="\ezolar\public\css\admin\admin.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\admin\issues.css">
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
            <a href="<?=URLROOT?>/AdminProject"><div class="box9">
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
    <div class="dashboard-common-main-topic" style="width: 100%; display:flex; justify-content:start; align-items:center;">

        <div class="common-main-left-img">
                <img src="\ezolar\public\img\engineer\ReportIssue.png" alt="Issues-icon">
        </div>
        <div class="common-main-txt" style="margin-left: 2%;">
            Reported Issues
        </div>


    </div>
    <div class="category-container">
        <div class="category-btn" id="unread-btn">Unread</div>
        <div class="category-btn" id="read-btn">Read</div>
        <div class="category-btn" id="resolved-btn">Resolved</div>
    </div>


    <div class="issue-list-container" id="unread-issues">
        <?php
        $results = $_SESSION['rows']['unread'];
        if (count($results)<=0){
            echo '<div class="no-issues-text">No unread issues.</div>';
        } else {
            foreach($results as $row){
                echo '<div class="issue-box">
                            <div class="issue-text-container">
                                <div class="issue-text-container-inner">
                                    <div class="issue-text-no">Issue No : ' .  str_pad($row -> issueID, 6, "0", STR_PAD_LEFT) . '</div>
                                    <div class="issue-text-name"><b>Topic : ' . $row -> topic . '</b></div>
                                    <div class="issue-text-no">Sender : ' .  $row -> name . '</div>
                                </div>
                            </div>
                            <div class="issue-details-btn-container">
                                <a href="/ezolar/AdminIssue/viewIssue/'.$row -> issueID.'">
                                    <div class="issue-details-btn">
                                        <div class="issue-details-btn-text">More Info</div>
                                    </div>
                                </a>
                            </div>
                        </div>';
            }
        }
        ?>
    </div>
    <div class="issue-list-container" id="read-issues">
            <?php
            $results = $_SESSION['rows']['read'];
            if (count($results)<=0){
                echo '<div class="no-issues-text">No issues here.</div>';
            } else {
                foreach($results as $row){
                    echo '<div class="issue-box">
                                <div class="issue-text-container">
                                    <div class="issue-text-container-inner">
                                        <div class="issue-text-no">Issue No.: ' .  str_pad($row -> issueID, 6, "0", STR_PAD_LEFT) . '</div>
                                        <div class="issue-text-name"><b>Topic : ' . $row -> topic . '</b></div>
                                        <div class="issue-text-no">Sender: ' .  $row -> name . '</div>
                                    </div>
                                </div>
                                <div class="issue-details-btn-container">
                                    <a href="/ezolar/AdminIssue/viewIssue/'.$row -> issueID.'">
                                        <div class="issue-details-btn">
                                            <div class="issue-details-btn-text">More Info</div>
                                        </div>
                                    </a>
                                </div>
                            </div>';
                }
            }
            ?>
    </div>
    <div class="issue-list-container" id="resolved-issues">
            <?php
            $results = $_SESSION['rows']['resolved'];
            if (count($results)<=0){
                echo '<div class="no-issues-text">No Resolved Issues here.</div>';
            } else {
                foreach($results as $row){
                    echo '<div class="issue-box">
                                <div class="issue-text-container">
                                    <div class="issue-text-container-inner">
                                        <div class="issue-text-no">Issue No.: ' .  str_pad($row -> issueID, 6, "0", STR_PAD_LEFT) . '</div>
                                        <div class="issue-text-name"><b>Topic : ' . $row -> topic . '</b></div>
                                        <div class="issue-text-no">Sender: ' .  $row -> name . '</div>
                                    </div>
                                </div>
                                <div class="issue-details-btn-container">
                                    <a href="/ezolar/AdminIssue/viewIssue/'.$row -> issueID.'">
                                        <div class="issue-details-btn">
                                            <div class="issue-details-btn-text">More Info</div>
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
unset($_SESSION['rows']);
?>
</div>
<script>
    var unread_btn = document.getElementById("unread-btn");
    var read_btn = document.getElementById("read-btn");
    var resolved_btn = document.getElementById("resolved-btn");

    var unread_cont = document.getElementById("unread-issues");
    var read_cont = document.getElementById("read-issues");
    var resolved_cont = document.getElementById("resolved-issues")
    var all_cont = document.getElementsByClassName("issue-list-container");
    Array.from(all_cont).forEach(hideCont);
    unread_btn.classList.add('select');
    unread_cont.classList.remove('hide');
    unread_cont.classList.add('select');

    function hideCont(pack){
        pack.classList.remove('select');
        pack.classList.add('hide');
    }

    function selectPackages(pack){
        Array.from(all_cont).forEach(hideCont);
        pack.classList.remove('hide');
        pack.classList.add('select');
    }

    unread_btn.addEventListener('click', function(btn) {
        btn.target.classList.add('select');
        read_btn.classList.remove('select');
        resolved_btn.classList.remove('select');
        selectPackages(unread_cont);
    });
    read_btn.addEventListener('click', function(btn) {
        btn.target.classList.add('select');
        unread_btn.classList.remove('select');
        resolved_btn.classList.remove('select');
        selectPackages(read_cont);
    });
    resolved_btn.addEventListener('click', function(btn) {
        btn.target.classList.add('select');
        read_btn.classList.remove('select');
        unread_btn.classList.remove('select');
        selectPackages(resolved_cont);
    });
</script>
</body>
</html>

