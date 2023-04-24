<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="/ezolar/public/css/style.css">
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    

 </head>
<body>
    <!-- <script>
        var d1 = '';
        var d2 = '';
        var d3 = '';

    </script> -->

<div id="id04" class="modal">
    <span onclick="location.href=''" class="close" title="Close">×</span>
    <form class="modal-content" id="sch" action="./../scheduleDateUpdate?project_id=<?php echo $_GET['project_id'] ?>" method="POST">
    
      <div class="container">
          <h1>Inspection Scheduling</h1>
          <p>We kindly request you to select three dates for inspection at your convenience. Thank you!</p>
          <p>(Please note that we are closed on weekend.)</p>

          <div class="err">Date 1:
          </div>
          <input class="r-in datepicker" name="d1" id="d1" type="text" placeholder="" required >  
          <div class="err">Date 2:
          </div>
          <input class="r-in datepicker2" name="d2" id="d2" type="text" placeholder="" required >
          <div class="err">Date 3:
          </div>
          <input class="r-in datepicker3" name="d3" id="d3" type="text" placeholder="" required >

          <div class="clearfix">
            <button type="cancel" onclick="location.href=''" class="deletebtn">Cancel</button>
            <button type="submit" class="okbtn">OK</button>
          </div>
      </div>
    </form>
</div>

<script>

$('.datepicker').datepicker({
	
	beforeShowDay: function(date) {
        var d2=document.getElementById('d2').value;
        var d3=document.getElementById('d3').value;

        const date2 = new Date(d2);
        const date3 = new Date(d3);
       
        console.log(date.getTime());
		var showDay = true;
		if (date.getDay() == 0 || date.getDay() == 6) {
			showDay = false;
		}
        if (date.getTime() == date2.getTime()) {
			showDay = false;
        }

        if (date.getTime() == date3.getTime()) {
			showDay = false;
        }
		
		return [showDay];
	}
});

$('.datepicker2').datepicker({
	
	beforeShowDay: function(date) {
        var d1=document.getElementById('d1').value;
        var d3=document.getElementById('d3').value;

        const date1 = new Date(d1);
        const date3 = new Date(d3);
        
		var showDay = true;
		if (date.getDay() == 0 || date.getDay() == 6) {
			showDay = false;
		}

        if (date.getTime() == date1.getTime()) {
			showDay = false;
        }

        if (date.getTime() == date3.getTime()) {
			showDay = false;
        }
		
		return [showDay];
	}
});

$('.datepicker3').datepicker({
	
	beforeShowDay: function(date) {
        var d1=document.getElementById('d1').value;
        var d2=document.getElementById('d2').value;

        const date1 = new Date(d1);
        const date2 = new Date(d2);

		var showDay = true;
		if (date.getDay() == 0 || date.getDay() == 6) {
			showDay = false;
		}

        if (date.getTime() == date1.getTime()){
			showDay = false;
        }

        if (date.getTime() == date2.getTime()) {
			showDay = false;
        }
		
		return [showDay];
	}
});
// Get the modal
var modal = document.getElementById('id04');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    location.href='';
  }
}
</script>

</body>
</html>