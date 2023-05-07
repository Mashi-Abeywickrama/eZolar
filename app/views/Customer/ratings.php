<?php
    define('__ROOT__', dirname(dirname(dirname(__FILE__))));
    require_once(__ROOT__.'\views\Customer\navbar.php');

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
    <link rel="stylesheet" href="\ezolar\public\css\customer.dashboard.common.css">
    <link rel="stylesheet" href="\ezolar\public\css\customer.ratings.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>user reports</title>
</head>

<body>
<div class="body-container">
    <!-- left navigation panel -->
    <?php
        require_once(__ROOT__.'\views\Customer\navigationpanel.php');
    ?>

    <div class="common-main-container">
        <!-- heading of the page -->
        <div class="dashboard-common-main-topic">
            <div class="common-main-topic-left">
                <div class="common-main-left-img">
                        <img src="\ezolar\public\img\customer\Cash.png" alt="transaction">
                </div>
                <div class="common-main-txt">
                    Ratings and Reviews
                </div>
            </div>  
        </div>

        <!-- rest goes here -->
        <div class="avg-ratings">
            
            <span class="heading">User Ratings on Team eZolar</span>
            
            
           
            <p><?php echo round($data['avg']*2)/2 ?> average based on <?php echo $data['total'] ?> reviews.</p>
            <div class="star-cont" style="margin-top: -2rem;margin-left: 61rem;">
            <?php
               $full =  floor($data['avg']);
               for ($i=1; $i <= 5; $i++) { 
                if ($i <= $full) {
                    echo '<span class="fa fa-star checked"></span>';
                }
                elseif ($i == $full+1) {
                    if (is_int($data['avg'])) {
                        echo '<span class="fa fa-star-o" style="color:orange"></span>';
                    }else {
                        echo '<span class="fa fa-star-half-full" style="color:orange"></span>';
                    }
                }
                else {
                    echo '<span class="fa fa-star-o" style="color:orange"></span>';
                }
               }
                
             ?>
             </div>
            
            <hr style="border:3px solid #f1f1f1;width: 95%;">

            <div class="row">
                <div class="side">
                    <div>5 star</div>
                </div>
                <div class="middle">
                    <div class="bar-container">
                        <div id="bar-5" class="bar-5"></div>
                    </div>
                </div>
                <div class="side right">
                    <div><?php echo $data['count5'] ?></div>
                </div>
                <div class="side">
                    <div>4 star</div>
                </div>
                <div class="middle">
                    <div class="bar-container">
                        <div id="bar-4" class="bar-4"></div>
                    </div>
                </div>
                <div class="side right">
                    <div><?php echo $data['count4'] ?></div>
                </div>
                <div class="side">
                    <div>3 star</div>
                </div>
                <div class="middle">
                    <div class="bar-container">
                        <div id="bar-3" class="bar-3"></div>
                    </div>
                </div>
                <div class="side right">
                    <div><?php echo $data['count3'] ?></div>
                </div>
                <div class="side">
                    <div>2 star</div>
                </div>
                <div class="middle">
                    <div class="bar-container">
                        <div id="bar-2" class="bar-2"></div>
                    </div>
                </div>
                <div class="side right">
                    <div><?php echo $data['count2'] ?></div>
                </div>
                <div class="side">
                    <div>1 star</div>
                </div>
                <div class="middle">
                    <div class="bar-container">
                        <div id="bar-1" class="bar-1"></div>
                    </div>
                </div>
                <div class="side right">
                    <div><?php echo $data['count1'] ?></div>
                </div>
            </div>


            <div class="sample-reviews">
                <?php
                $review_count = count($data['review']);
                if ($review_count < 7) {
                    foreach ($data['review'] as $row) { ?>
                        <div class="review">
                            <div class="review-h">
                                <div class="c-name">
                                    <?php echo $row->name ?>
                                </div>
                                <div class="stars">
                                    <?php
                                    for ($i=1; $i <= 5; $i++) { 
                                        if ($i <= $row->stars) {
                                            echo '<span class="fa fa-star checked"></span>';
                                        }
                                        else {
                                            echo '<span class="fa fa-star-o" style="color:orange"></span>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            
                            <div class="comment">
                                 <?php echo $row->comment ?>
                            </div>
                        </div>
                    <?php }
                }else{
                    for ($i=0; $i < 6; $i++) { ?>
                        <div class="review">
                            <div class="review-h">
                                <div class="c-name">
                                    <?php echo $data['review'][$i]->name ?>
                                </div>
                                <div class="stars">
                                    <?php
                                    for ($j=1; $j <= 5; $j++) { 
                                        if ($j <= $data['review'][$i]->stars) {
                                            echo '<span class="fa fa-star checked"></span>';
                                        }
                                        else {
                                            echo '<span class="fa fa-star-o" style="color:orange"></span>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            
                            <div class="comment">
                                 <?php echo $data['review'][$i]->comment ?>
                            </div>
                        </div>
                    <?php }
                }
                ?>
               
            </div>
        </div>


        <!-- add your rating here -->
        <div class="your-feedback">
            <div class="feedback-topic">
                How would you like to rate us?
            </div>
            <form name="rating-form" action="./reviews/add" method="POST">
                <div>
                    Stars:
                </div>
               
            <div class="star-cont">
            <span class="star-cb-group">
              <input type="radio" id="rating-5" name="rating" value="5"><label for="rating-5">5</label>
              <input type="radio" id="rating-4" name="rating" value="4" checked="checked"><label for="rating-4">4</label>
              <input type="radio" id="rating-3" name="rating" value="3"><label for="rating-3">3</label>
              <input type="radio" id="rating-2" name="rating" value="2"><label for="rating-2">2</label>
              <input type="radio" id="rating-1" name="rating" value="1"><label for="rating-1">1</label>
              
            </span>
            </div>
        

                <div>
                    Comment:
                </div>
                <div>
                    <input class="u-comment" type="text" name="comment" id="comment" placeholder="leave your comment here...">
                </div>
                <div class="btn-div">
                    <button type="submit" value="submit">submit</button>
                </div>
            </form>
        </div>
    
    </div>
</div>

<!-- footer -->
<div class="f">
    <?php 
          $this->view('Includes/footer', $data);
    ?>
</div>

</body>
</html>
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-76614800-1"></script>
<script>
    var total = <?php echo $data['total'] ?>;

    var count5 = <?php echo $data['count5'] ?>;
    var val5 = (count5/total) *100;
    document.getElementById('bar-5').style.width = val5+"%";

    var count4 = <?php echo $data['count4'] ?>;
    var val4 = (count4/total) *100;
    document.getElementById('bar-4').style.width = val4+"%";

    var count3 = <?php echo $data['count3'] ?>;
    var val3 = (count3/total) *100;
    document.getElementById('bar-3').style.width = val3+"%";

    var count2 = <?php echo $data['count2'] ?>;
    var val2 = (count2/total) *100;
    document.getElementById('bar-2').style.width = val2+"%";

    var count1 = <?php echo $data['count1'] ?>;
    var val1 = (count1/total) *100;
    document.getElementById('bar-1').style.width = val1+"%";
</script>