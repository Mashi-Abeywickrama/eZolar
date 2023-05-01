<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="/ezolar/public/css/style.css">
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    

 </head>
<body>


<div id="calc" class="modal">
    <span onclick="location.href=''" class="close" title="Close">×</span>
    <form class="modal-content" id="sch" action="" method="POST">
    
    <div class="container">
            <h1>Estimate The Invested Based On <br>Your Power Consumption</h1>
            <p>Enter your details in the calculator below.</p>

            <label for="unit" class="unit">Average Monthly Units Used</label>
            <input name="unit" class="units" type="number" required onkeyup=checkInvestment(this.value)>

                <p>The following is the approximate cost of solar panels only. Final cost will depend on site conditions.</p>
            
                <div class="result">
                    <div class="investment-div">
                        <label for="investment">Investment Required:</label>
                        <div class="line" id="investment">

                        </div>
                    </div>
                    <div class="investment-div">
                        <label for="power">Solar Power:</label>
                        <div class="line">
20
                        </div>
                    </div>
                </div>
            

            <script>
              function checkInvestment(amount){
                  console.log(amount);
                  document.getElementById('investment').value ="LKR "+amount*2112;
              }
            </script>

        </div>
    </form>
</div>

<script>

// Get the modal
var modal = document.getElementById('calc');
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