<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="\ezolar\public\css\style.css">
    <link rel="stylesheet" href="\ezolar\public\css\admin\pop-up.css">
</head>
<body>
    

</html>
<div id="sp-pop" class="modal">
    <span onclick="location.href=''" class="close" title="Close">×</span>
    <div class="modal-content" id="del">
            <form class="container popup-container" action="/ezolar/AdminProject/updateSalesperson/<?php echo $_SESSION['projectID']?>" method="POST"> 
                <label for="myDropdown">Select Salesperson:</label>
                <select id="sp" name="sp">
                <?php 
                foreach ($_SESSION['employees']['allSalespersons'] as $option) 
                {echo '<option value="'.$option->empID.'">'.$option->empID. ':' .$option->name. '</option>';} 
                ?>
                </select>
              <div class="popup-btn-container">
                    <a href="" type="submit" class="popup-no-btn" id="no-btn">No</a>
                  <Button type="submit" class="popup-yes-btn" id="yes-btn">Yes</Button>
              </div>
            </form>
    </div>
</div>

<div id="eng-pop" class="modal">
    <span onclick="location.href=''" class="close" title="Close">×</span>
    <div class="modal-content" id="del">
            <form class="container popup-container" action="/ezolar/AdminProject/updateEngineer/<?php echo $_SESSION['projectID']?>" method="POST"> 
                <label for="myDropdown">Select Engineer:</label>
                <select id="eng" name="eng">
                <?php 
                foreach ($_SESSION['employees']['allEngs'] as $option) 
                {echo '<option value="'.$option->empID.'">'.$option->empID. ':' .$option->name. '</option>';} 
                ?>
                </select>
              <div class="popup-btn-container">
                    <a href="" type="submit" class="popup-no-btn" id="no-btn">No</a>
                  <Button type="submit" class="popup-yes-btn" id="yes-btn">Yes</Button>
              </div>
            </form>
    </div>
</div>

<div id="contr-pop" class="modal">
    <span onclick="location.href=''" class="close" title="Close">×</span>
    <div class="modal-content" id="del">
            <form class="container popup-container" action="/ezolar/AdminProject/updateContractor/<?php echo $_SESSION['projectID']?>" method="POST"> 
                <label for="myDropdown">Select Contractor:</label>
                <select id="contr" name="contr">
                <?php 
                foreach ($_SESSION['employees']['allContractor'] as $option) 
                {echo '<option value="'.$option->empID.'">'.$option->empID. ':' .$option->name. '</option>';} 
                ?>
                </select>
              <div class="popup-btn-container">
                    <a href="" type="submit" class="popup-no-btn" id="no-btn">No</a>
                  <Button type="submit" class="popup-yes-btn" id="yes-btn">Yes</Button>
              </div>
            </form>
    </div>
</div>

<script>
// Get the modal
var modal = document.getElementById('sp-pop');
var modal = document.getElementById('eng-pop');
var modal = document.getElementById('contr-pop');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";   
  }
}

var no_btn = document.getElementById('no-btn');
no_btn.addEventListener('click', function(btn) {
    modal.style.display = "none";   });


</script>

</body>