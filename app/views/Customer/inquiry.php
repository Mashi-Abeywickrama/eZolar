<?php
    //  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
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
    <link rel="stylesheet" href="\ezolar\public\css\customer.inquiry.css">
    <title>My Projects</title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#search-invoice").keyup(function(){
				var searchText = $(this).val();
				$.ajax({
					url: './inquiry/inquiry_search',
					type: 'post',
					data: {search: searchText},
					success: function(response){
						$("#body-list-container").html(response);
					}
				});
			});
		});
	</script>
    <div class = "body-container-main">
        <div class="body-container">
        <?php
            require_once(__ROOT__.'\app\views\Customer\navigationpanel.php');
        ?>

            <div class="common-main-container">
                <div class="dashboard-common-main-topic">
                    <div class="common-main-topic-left">
                        <div class="common-main-left-img">
                            <a href=”” “text-decoration: none”>
                                <img src="\ezolar\public\img\customer\Inquiry.png" alt="Inquiry">
                            </a>
                        </div>
                        <div class="common-main-txt">
                            Inquiries
                        </div>
                    </div>
                    <div class = "common-main-topic-right">
                        <!-- <div>
                            <input type="text">
                        </div> -->
                        <div class="add-inquiry-btn">
                            <div class="add-inquiry-btn-text">
                                <a href="/ezolar/inquiry/newInquiryPage"> New Inquiry</a> 
                            </div>
                        </div>
                        <div class="search-inquiry-btn">
                            <div class="add-inquiry-input">
                                <input id="search-invoice" type="text" placeholder="Search..">
                            </div>
                            <div class = "search-inquiry-img">
                                <img src="\ezolar\public\img\customer\loupe.png" alt="">
                            </div>
                        </div>
                    </div>
  
                </div>
                <div id="body-list-container" class="body-list-container">

            <?php
            $results = $_SESSION['rows'];
            foreach($results as $row){
                echo '<div class="inquiry-box">
                        <span class="inquiry-text-container">
                            <div class="inquiry-text-container-inner">
                                <div class="inquiry-text-no">Type:' .  $row -> type . '</div>
                                <div class="inquiry-text-name"><b>' . $row -> topic . '</b></div>
                            </div>
                        </span>
                        <span class="inquiry-details-btn-container">
                            <div class="inquiry-details-btn">
                                <span class="inquiry-details-btn-text"><a href="'.URLROOT.'/inquiry/viewInquiry/'.$row -> inquiryID.'" style ="color: #FFFFFF ">More info</a></span>
                            </div>
                            
                        </span>
                        
                    </div>';
            }
            ?>
            
        </div>

            </div>
    </div>
    <div class="f">
    <?php 
      $this->view('Includes/footer', $data);
    ?>
    </div>
</div>
</body>

</html>
