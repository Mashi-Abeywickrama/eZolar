<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="/ezolar/public/css/style.css">
    
</head>
<body>
    

</html>
<div id="acc" class="modal">
  <span onclick="location.href=''" class="close" title="Close">×</span>
  <form class="modal-content" id="accept_action" action="" method="POST">
  
    <div class="container">
      <h1>Great!!</h1>
      <p>Do you really want to accept this project?</p>
    
      <div class="clearfix">
        <button type="submit" class="deletebtn">Yes</button>
        <button type="button" onclick="location.href=''"class="okbtn">No</button>
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    location.href='';
  }
}
</script>

</body>