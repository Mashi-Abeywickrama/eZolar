<?php 
// print_r($data['project'][0]->siteAddress);die();
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="/ezolar/public/css/style.css">
    <link rel="stylesheet" href="/ezolar/public/css/contractor.projects.css">
    
</head>
<body>
<div id="projectD" class="modal">
  <span onclick="location.href='/ezolar/ContractorSchedule'" class="close" title="Close">×</span>
  <form class="modal-content-p" id="del" action="" method="POST">
  
    <div class="project-details-container">
    <div class="project-details-inline-container">
                <div class="details-topic">
                            Site Details
                </div>
                <div class="details-wrapper">
                    <div class="details-box">
                        <div class="t">
                            Delivery Location:
                        </div>
                        <div class="d">
                            <?php echo $data['project'][0]->siteAddress ?>
                        </div>
                    </div>
                    <div class="details-box">
                        <div class="t">
                            Delivery Date:
                        </div>
                        <div class="d">
                        <?php echo $data['schedule'][0]->date ?>
                        </div>
                    </div>
                    <div class="details-box">
                        <div class="t">
                            Assigned Salesperson:
                        </div>
                        <div class="d">
                        <?php echo $data['salesperson'][0]->name ?>
                        </div>
                    </div>
                    <div class="details-box">
                        <div class="t">
                            Assigned Engineer:
                        </div>
                        <div class="d">
                        <?php echo $data['engineer'][0]->name ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="project-details-customer-container">
                <div class="details-topic">
                    Customer Details
                </div>
                <div class="details-wrapper">
                    <div class="details-box">
                        <div class="t">
                            Customer Name:
                        </div>
                        <div class="d">
                        <?php echo $data['project'][0]->name ?>
                        </div>
                    </div>
                    <div class="details-box">
                        <div class="t">
                            Contact Number:
                        </div>
                        <div class="d">
                        <?php echo $data['project'][0]->mobile ?>
                        </div>
                    </div>
                </div>
            </div>
              
        </div>  
        <div class="buttons">
            <?php if ($data['schedule'][0]->isCompleted == 0) { ?>
                <a href='/ezolar/project/markascomplete?projectid=<?php echo $_GET['projectid'] ?>' class="btn-c" >
                Mark as Completed
            </a>
            <?php } ?>
                
                <a href='/ezolar/ContractorSchedule' class="btn-a" style = "color:#ffffff">
                    Ok
            </a>    
            </div>          
    </div>
    

  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('projectD');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    location.href='/ezolar/ContractorSchedule';
  }
}
</script>

</body>
</html>