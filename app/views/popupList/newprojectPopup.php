<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="/ezolar/public/css/style.css">
    
</head>
<body>
<div id="id02" class="modal">
  <span onclick="location.href='index'" class="close" title="Close">×</span>
  <form class="modal-content" id="del" action="" method="POST">
  
    <div class="container">
      <h1>Thank You!</h1>
      <p>Your Project request has been sent successfully</p>
    
      <div class="clearfix">
        <button type="button" onclick="location.href='index'"class="okbtn">OK</button>
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id02');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    location.href='index';
  }
}
</script>

</body>
</html>